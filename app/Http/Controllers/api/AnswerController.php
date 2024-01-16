<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    use ApiResponseTrait;


    public function index(){
        $Answers=Answer::all();
        return $this->ApiResponse( $Answers ,'ok' ,'200');
    }

    public function show($id){
        $Answers=Answer::find($id);

        if($Answers)
        {
            return $this->ApiResponse( $Answers ,'ok' ,'200');
        }
             return $this->ApiResponse( null ,'message not found' ,'404');

    }
}
