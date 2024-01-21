<?php

namespace App\Http\Controllers;

use App\Models\share;
use Illuminate\Http\Request;

class ShareController extends Controller
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
        $share=share::create($request->all());
        return response($share);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(share $share)
    {
        //
    }
}
