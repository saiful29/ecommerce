<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //

        return view("admin.category.create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        //
        $category = new category();


        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = random_int(100000,999999).'.'.request()->image->getClientOriginalExtension();
        $path = "upload/category_image/";
        request()->image->move(public_path($path), $imageName);


        $category->name             = $request->name;
        $category->description      = $request->description;
        $category->img              = $path.$imageName;

        $category->save();

        return redirect()->route('category.showall')->with('message','Category created successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showall()
    {
        //

        $categories = category::all();
        $count = category::all()->count();
        return view('admin.category.showall')->with('data',$categories)->with('count',$count);

    }

    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return string
     */
    public function destroy($id)
    {
        //

            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category.showall')->with('message',"Delete SUccessfully $id");

    }
}
