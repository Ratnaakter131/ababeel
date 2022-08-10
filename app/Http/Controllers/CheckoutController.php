<?php

namespace App\Http\Controllers;

use App\Models\Billing_detail;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order_detail;
use App\Models\Order_summery;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public  function checkout(){
        if(strpos(url()->previous(), 'cart') || strpos(url()->previous(), 'checkout')){
            return view('frontend.checkout',[
                'countries' => Country::where('status', 'active')->get(['id', 'name'])
            ]);
        }
        else{
            abort(404);
        }
    }
    public function checkout_post(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'order_notes' => 'nullable',
        ]);
        // echo auth()->id();
        $order_summery_id = Order_summery::insertGetId([
           'coupon_name' =>  session('s_coupon_name'),
           'cart_total' =>  session('s_cart_total'),
           'discount_total' =>  session('s_discount_total'),
           'sub_total' =>  round(session('s_cart_total')- session('s_discount_total')),
           'shipping' =>  60,
           'grand_total' =>  round(session('s_cart_total') - session('s_discount_total'))+60,
           'payment_option' =>  $request->payment_option,
           'user_id' =>  auth()->id(),
           'created_at' => Carbon::now(),
        ]);
        Billing_detail::insert([
            'order_summery_id' =>   $order_summery_id,
            'name' =>   $request->name,
            'email' =>   $request->email,
            'phone_number' =>   $request->phone_number,
            'country_id' =>   $request->country,
            'city_id' =>   $request->city,
            'address' =>   $request->address,
            'postcode' =>   $request->postcode,
            'notes' =>   $request->order_notes,
            'created_at' => Carbon::now(),
        ]);
         foreach(allcarts() as $cart){
            Order_detail::insert([
                'order_summery_id' => $order_summery_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'amount' => $cart->amount,
                'created_at' => Carbon::now(),
            ]);
            // product table deducation
            Product::find($cart->product_id)->decrement('product_quantity', $cart->amount);
            //cart from delete
            Cart::find($cart->id)->delete();
         }
         if(session('s_coupon_name')){
            Coupon::where('coupon_name', session('s_coupon_name'))->decrement('limit', 1);
         }
         return redirect('home')->with('final_success', 'purchase completed successfully!');
        // if($request->payment_option == 1){
        //     echo "COD";
        // }
        // else{
        //     echo "online payment";
        // }
    }
    public function get_city_list(Request $request)
    {
        $string_to_show = "<option value=''>--Select a City--</option>";
        foreach(City::where('country_id', $request->country_id)->get(['id', 'name']) as $city){
            $string_to_show .= "<option value='$city->id'>$city->name</option>";
        }
        echo $string_to_show;
    }
}
