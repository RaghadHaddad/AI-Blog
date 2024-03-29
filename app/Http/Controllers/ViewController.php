<?php

namespace App\Http\Controllers;

use App\Models\view;
use Illuminate\Http\Request;

class ViewController extends Controller
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
        $view=view::create($request->all());
        return response($view);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function show(view $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(view $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, view $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(view $view)
    {
        //
    }
}
