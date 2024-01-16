<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opinion;

class OpinionController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $Opinion=Opinion::all();
        return $this->ApiResponse( $Opinion ,'ok' ,'201');
    }

    public function show($id){
        $Opinon=Opinion::find($id);

        if($Opinon)
        {
            return $this->ApiResponse( $Opinon ,'ok' ,'200');
        }
        return $this->ApiResponse( null ,'message not found' ,'404');

    }
}
