<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\News;
use App\Models\Authors;
use App\Models\Category;
use App\Http\Traits\UploadPhotoTrait;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use UploadPhotoTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors=Authors::all();
        $categories = Category::where('section', 'news')
                       ->orWhere('section', 'blogs')
                       ->get();
        $new=News::all();
        return view('news.all_news',compact('new','authors','categories'));
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
        $destination = 'images/news';
        $imagePath = $this->UploadPhoto($request , $destination , 'image');
        $imagePath = str_replace('public/images/news/', '', $imagePath);

        $news= News::create([
            'author_id' =>$request->author_id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'image'=>$imagePath,
            'overview'=>$request->overview,
            'section' =>$request->section,
            'publicate_date'=>$request->publicate_date,
            'reading_time' =>$request->reading_time
        ]);
        $news->save();
            // Redirect the user back to the author page
        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $new=News::find($id);
        $new->delete();
        return redirect('/news');
    }


     /**index for api */
     public function index_api(){
        $newsItems = News::with('contentnews' ,'view_news' ,'share_news' , 'comment_news', 'like_news')
        ->whereHas('category', function($query){
            $query->where('section', 'news');
        })->get();
        $news_responses = [];
        foreach ($newsItems as $news) {
            $news_response=[
                'author_name'    =>$news->author->author_name,
                'category_name'   =>$news->category->name,
                'title'          =>$news->title,
                'image'          =>asset('storage/app/' . $news->image),
                'overview'       =>$news->overview,
                'reading_time'   =>$news->reading_time,
                'publicate_date' =>$news->publicate_date,
                'contents'     => $news->contentnews,
                'totla_like'   =>$news->like_news->where('news_id', $news->id)->count(),
                'totla_view'   =>$news->view_news->where('news_id', $news->id)->count(),
                'totla_share'   =>$news->share_news->where('news_id', $news->id)->count(),
                'totla_comment'   =>$news->comment_news->where('news_id', $news->id)->count(),
            ];
            $news_responses[] = $news_response;
        }
        return response( $news_responses);
    }

    public function show_today_news(){
        $newsItems = News::where('section', 'today_news')
        ->with('contentnews' ,'view_news' ,'share_news' , 'comment_news', 'like_news')
        ->get();
        $news_responses = [];
        foreach ($newsItems as $news) {
            $news_response=[
                'author_name'    =>$news->author->author_name,
                'category_name'   =>$news->category->name,
                'title'          =>$news->title,
                'image'          => asset('storage\app' .$news->image),
                'overview'       =>$news->overview,
                'reading_time'   =>$news->reading_time,
                'publicate_date' =>$news->publicate_date,
                'contents'     => $news->contentnews,
                'totla_like'   =>$news->like_news->where('news_id', $news->id)->count(),
                'totla_view'   =>$news->view_news->where('news_id', $news->id)->count(),
                'totla_share'   =>$news->share_news->where('news_id', $news->id)->count(),
                'totla_comment'   =>$news->comment_news->where('news_id', $news->id)->count(),
            ];
            $news_responses[] = $news_response;
        }
        return response( $news_responses);
    }

    public function show_post(){
        $newsItems = News::where('section', 'posts')
        ->with('contentnews' ,'view_news' ,'share_news' , 'comment_news', 'like_news')
        ->whereHas('category', function($query){
            $query->where('section', 'news');
        })
        ->get();
        $news_responses = [];
        foreach ($newsItems as $news) {
            $news_response=[
                'author_name'    =>$news->author->author_name,
                'author_image'    =>$news->author->author_image,
                'category_name'   =>$news->category->name,
                'title'          =>$news->title,
                'image'          =>$news->image,
                'overview'       =>$news->overview,
                'reading_time'   =>$news->reading_time,
                'publicate_date' =>$news->publicate_date,
                'contents'     => $news->contentnews,
                'totla_like'   =>$news->like_news->where('news_id', $news->id)->count(),
                'totla_view'   =>$news->view_news->where('news_id', $news->id)->count(),
                'totla_share'   =>$news->share_news->where('news_id', $news->id)->count(),
                'totla_comment'   =>$news->comment_news->where('news_id', $news->id)->count(),
            ];
            $news_responses[] = $news_response;
        }
        return response( $news_responses);
    }

    public function show_Main_news(){
        $newsItems = News::where('section', 'Main_news')
        ->with('contentnews' ,'view_news' ,'share_news' , 'comment_news', 'like_news')
        ->get();
        $news_responses = [];
        foreach ($newsItems as $news) {
            $news_response=[
                'author_name'    =>$news->author->author_name,
                'category_name'  =>$news->category->name,
                'title'          =>$news->title,
                'image'          =>$news->image,
                'overview'       =>$news->overview,
                'reading_time'   =>$news->reading_time,
                'publicate_date' =>$news->publicate_date,
                'contents'       =>$news->contentnews,
                'totla_like'   =>$news->like_news->where('news_id', $news->id)->count(),
                'totla_view'   =>$news->view_news->where('news_id', $news->id)->count(),
                'totla_share'   =>$news->share_news->where('news_id', $news->id)->count(),
                'totla_comment'   =>$news->comment_news->where('news_id', $news->id)->count(),
            ];
            $news_responses[] = $news_response;
        }
        return response( $news_responses);
    }

    public function show_blogs(){
        $newsItems = News::with('contentnews' ,'view_news' ,'share_news' , 'comment_news', 'like_news')
        ->whereHas('category', function($query){
            $query->where('section', 'blogs');
        })->get();
        $news_responses = [];
        foreach ($newsItems as $news) {
            $news_response=[
                'author_name'    =>$news->author->author_name,
                'category_name'   =>$news->category->name,
                'title'          =>$news->title,
                'image'          =>asset('storage/app/' . $news->image),
                'overview'       =>$news->overview,
                'reading_time'   =>$news->reading_time,
                'publicate_date' =>$news->publicate_date,
                'contents'     => $news->contentnews,
                'totla_like'   =>$news->like_news->where('news_id', $news->id)->count(),
                'totla_view'   =>$news->view_news->where('news_id', $news->id)->count(),
                'totla_share'   =>$news->share_news->where('news_id', $news->id)->count(),
                'totla_comment'   =>$news->comment_news->where('news_id', $news->id)->count(),
            ];
            $news_responses[] = $news_response;
        }
        return response( $news_responses);
    }

}
