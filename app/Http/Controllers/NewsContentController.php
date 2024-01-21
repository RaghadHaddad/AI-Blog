<?php

namespace App\Http\Controllers;

use App\Models\News_content;
use App\Models\News;
use Illuminate\Http\Request;

class NewsContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new=News::all();
        $contents=News_content::all();
        return view('news.news_content' ,compact('contents','new'));
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
        News_content::create([
            'news_id' => $request->news_id,
            'title' => $request->title,
            'description' => $request->description,

        ]);
        session()->flash('Add', 'add content successfully');
        return redirect('/news_content');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News_content  $news_content
     * @return \Illuminate\Http\Response
     */
    public function show(News_content $news_content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News_content  $news_content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents=News_content::find($id);
        $new=News::all();
        return view('news.edit_content',compact('new','contents'));
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
        $contents=News_content::find($id);

        $request->validate([
            'news_id'      => 'required',
            'title'        => 'required',
            'description' => 'required'
        ]);

        $contents->update($request->all());

        return redirect('/news_content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News_content  $news_content
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contents=News_content::find($id);
        $contents->delete();
        return redirect('/news_content');
    }
}
