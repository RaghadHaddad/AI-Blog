<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Answers=Answer::all();
        return view('contact.Answer',compact('Answers'));
    }

    /**index for ip */
    public function index_api()

    {
        $Answers=Answer::get();
        return response( $Answers );
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
        Answer::create([
            'ask' => $request->ask,
            'answer' => $request->answer,

        ]);
        session()->flash('Add', 'add Answer successfully');
        return redirect('/answer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Answers=Answer::find($id);
        return view('contact.edit_answer',compact('Answers'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Answers=Answer::find($id);

        $request->validate([
            'ask'    => 'required',
            'answer'   => 'required'
        ]);

        $Answers->update($request->all());

        return redirect('/answer');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Answers=Answer::find($id);
        $Answers->delete();
        return redirect('/answer');
    }
}
