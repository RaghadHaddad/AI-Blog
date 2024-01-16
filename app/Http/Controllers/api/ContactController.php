<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contacts;

class ContactController extends Controller
{
    use ApiResponseTrait;
    public function store(Request $request){
        $contact=contacts::create($request->all());
        if($contact)
        {
            return $this->ApiResponse( $contact ,'save' ,'201');
        }
             return $this->ApiResponse( null ,' not save' ,'400');
    }
}
