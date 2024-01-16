<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    use ApiResponseTrait;


    public function index(){
        $Categories=Category::all();
        return $this->ApiResponse( $Categories ,'ok' ,'200');
    }


    public function show_Category_news(){
        $Categories=Category::where('section', 'news')->get();
        if($Categories)
        {
            return $this->ApiResponse( $Categories ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');

    }


    public function show_Category_home(){
        $Categories=Category::where('section', 'home')->get();
        if($Categories)
        {
            return $this->ApiResponse( $Categories ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');
    }


    public function show_Category_blog(){
        $Categories=Category::where('section', 'blogs')->get();
        if($Categories)
        {
            return $this->ApiResponse( $Categories ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');
    }


    public function show_Category_resource(){
        $Categories=Category::where('section', 'resource')->get();
        if($Categories)
        {
            return $this->ApiResponse( $Categories ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');
    }


    public function show_Category_podcast(){
        $Categories=Category::where('section', 'podcasts')->get();
        if($Categories)
        {
            return $this->ApiResponse( $Categories ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');
    }

}
