<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $data = Category::all();
        $subcategories = Subcategory::all();
        $count = Subcategory::all()->count();
        return view('admin.category.subcategory')->with('cat_data',$data)->with('datas',$subcategories)->with('count',$count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = random_int(100000,999999).'.'.request()->image->getClientOriginalExtension();
        $path = "upload/subcategory_image/";
        request()->image->move(public_path($path), $imageName);
        $subcategory->categories_id      = $request->categories_id;
        $subcategory->name             = $request->name;
        $subcategory->description      = $request->description;
        $subcategory->image              = $path.$imageName;
        $subcategory->save();
        return redirect()->route('subcategory.create')->with('message','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //

        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.create')->with('message',"Delete Successfully");

    }
}
