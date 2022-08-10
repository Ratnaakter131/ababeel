<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailOffer;
use App\Models\Country;
use App\Models\CustomerPassReset;
use App\Notifications\passResetNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(strpos(url()->previous(), "product/details")){
            return redirect(url()->previous());
        }
        return view('home', [
            'total_users' => User::count(),
            'total_admin' => User::where('role', 2)->count(),
            'total_customer' => User::where('role', 1)->count(),
        ]);
    }
    public function emailoffer(){
        return view('emailoffer', [
            'customers' => User::where('role', '!=', 2)->get()
        ]);
    }
    public function singleemailoffer($id){
        Mail::to(User::find($id)->email)->send(new EmailOffer());
        return back();
    }

    public function pass_reset() {
        return view('pass_reset');
    }

    function pass_reset_update(Request $request) {
      $customer = CustomerPassReset::where('token', $request->token)->firstOrFail();
      $customer_id = User::findOrFail($customer->customer_id);

      $customer_id->updated([
            'password' => Hash::make($request->password),
      ]);
        // CustomerPassReset::where('customer_id', $customer->customer_id)->delete();
        // return redirect()->route('customer.register.login')->with('success', 'Password Reset Success!');
    }

    function pass_reset_store(Request $request) {
        $customer = User::where('email', $request->email)->firstOrFail();
        $delete_old = CustomerPassReset::where('customer_id', $customer->id)->delete();

        $pass_rest_info = CustomerPassReset::create([
            'customer_id'=>$customer->id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now(),

        ]);
        Notification::send($customer, new passResetNotification($pass_rest_info));
    }

    function pass_reset_form($token){
        return view('pass_form', compact('token'));
    }

    public function checkemailoffer(Request $request){
        foreach($request->check as $id){
            Mail::to(User::find($id)->email)->send(new EmailOffer());
        }
         return back();
    }
    public function location()
    {
      return view('location.index',[
        'countries' => Country::get(['id', 'name', 'status']),
    ]); 
}
   public function location_update(Request $request) {
    Country::where('status', 'active')->update([
            'status' => 'deactive',
          ]);

      foreach($request->countries as $country_id){
          Country::find($country_id)->update([
            'status' => 'active',
          ]);
          return back();
      }
   }

}
