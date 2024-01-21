<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories=Category::all();
        return view('category.all_category',compact('Categories'));
    }

    /**index for api */
    public function index_api(){
        $Categories=Category::get();
        return response( $Categories);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'section' => $request->section,
        ]);
        session()->flash('Add', 'add category successfully');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categories=Category::find($id);

        return view('category.edit',compact('Categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Categories=Category::find($id);

        $request->validate([
            'name'      => 'required',
            'section'   => 'required'
        ]);

        $Categories->update($request->all());

        return redirect('/category');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Categories=Category::find($id);
        $Categories->delete();
        return redirect('/category');
    }



    /**api */
    public function show_Category_news(){
        $Categories=Category::where('section', 'news')->get();
        return response( $Categories);
    }


    public function show_Category_home(){
        $Categories=Category::where('section', 'home')->get();
        return response( $Categories);
    }


    public function show_Category_blog(){
        $Categories=Category::where('section', 'blogs')->get();
        return response( $Categories);
    }


    public function show_Category_resource(){
        $Categories=Category::where('section', 'resource')->get();
        return response( $Categories ,);
    }


    public function show_Category_podcast(){
        $Categories=Category::where('section', 'podcasts')->get();
        return response( $Categories);
    }
}
