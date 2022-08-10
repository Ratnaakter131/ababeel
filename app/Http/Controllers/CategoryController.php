<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('category.create');
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
            'category_name'=>'required',
            'category_tagline'=>'required',
            'category_photo'=>'required|image|mimes:png,jpg',
        ]);
        //photo upload start
        $new_category_photo_name = Auth::id().'_'.time().'_'.Str::random(5).'.'.$request->file('category_photo')->getClientOriginalExtension();
        Image::make($request->file('category_photo'))->resize(600, 328)->save(base_path('public/uploads/category_photos/'.$new_category_photo_name));
        //photo upload end

        //db insert start
        Category::insert([
            'category_name'=>$request->category_name,
            'category_tagline'=>$request->category_tagline,
            'category_photo'=> $new_category_photo_name,
            'created_at'=>Carbon::now(),
        ]);
        //db insert end
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('new_category_photo')){
            $new_category_photo_name = Auth::id().'_'.time().'_'.Str::random(5).'.'.$request->file('new_category_photo')->getClientOriginalExtension();
            // delete old photo
            unlink(base_path('public/uploads/category_photos/'.Category::find($id)->category_photo));
            // upload new photo
            Image::make($request->file('new_category_photo'))->resize(200, 200)->save(base_path('public/uploads/category_photos/' . $new_category_photo_name));
            // update to database
            Category::find($id)->update([
                'category_photo' => $new_category_photo_name
            ]);
        }
       Category::find($id)->update([
          'category_id' => $request->category_name,
          'category_tagline' => $request->category_tagline,
            'status' => $request->status,
       ]);
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(base_path('public/uploads/category_photos/'.$category->category_photo));
        $category->delete();
        return back();
    }
}
