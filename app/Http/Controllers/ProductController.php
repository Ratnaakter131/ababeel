<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_thumbnail;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index',[
            'products' => Product::where('user_id', auth()->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create',[
            'active_categories' => Category::where('status', 'show')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required'
        ]);
        //photo upload start
        $new_product_photo_name = Auth::id() . '_' . time() . '_' . Str::random(5) . '.' . $request->file('product_photo')->getClientOriginalExtension();
        Image::make($request->file('product_photo'))->resize(270, 310)->save(base_path('public/uploads/product_photos/' . $new_product_photo_name));
        //photo upload end
      $product_id = Product::insertGetId([
        'user_id' => auth()->id(),
        'category_id' => $request->category_id,
        'product_name' => $request-> product_name,
        'product_price' => $request-> product_price,
        'product_short_desp' => $request-> product_short_desp,
        'product_long_desp' => $request-> product_long_desp,
        'product_photo' =>   $new_product_photo_name,
        'product_code' => $request-> product_code,
        'product_slug' => Str::slug($request->product_name)."_".Str::random(5).auth()->id(),
        'product_quantity' => $request->product_quantity,
        'created_at' => Carbon::now(),
       ]);
        foreach($request->file('product_thumbnails') as $product_thumbnail){
        //photo upload start
        $new_product_photo_name = $product_id. '_' . time() . '_' . Str::random(5) . '.' .$product_thumbnail->getClientOriginalExtension();
        Image::make($product_thumbnail)->resize(800, 800)->save(base_path('public/uploads/product_thumbnails/' . $new_product_photo_name));
        Product_thumbnail::insert([
            'product_id'=> $product_id,
            'product_thumbnail_name'=> $new_product_photo_name,
            'created_at'=> Carbon::now(),
        ]);
    }
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
