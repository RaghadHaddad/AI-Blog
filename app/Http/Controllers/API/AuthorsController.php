<?php

namespace App\Http\Controllers\API;

use App\Models\Authors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Author=Authors::all();
        return view('Author.all_author',compact('Author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_author=$request->all();
        /***للتأكد من التسجيل مسبقاً */
        $input_exsit = Authors::where('author_name','=', $input_author['author_name'])->exists();

        if( $input_exsit){
            session()->flash('Error', ' The name is already registered');
            return redirect('/Author');
        }
        else{
            Authors::create([
                'author_name' => $request->author_name,
                'author_image' => $request->author_image,
                'country'  => $request->country,
                'permission'  => 'author'
            ]);
            session()->flash('Add', 'Name added successfully
            ');
            return redirect('/Author');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Author=Authors::find($id);

        return view('Author.edit',compact('Author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Author=Authors::find($id);

        $request->validate([
            'author_name'    => 'required',
            'author_image'   => 'required',
            'country'   => 'required',
            'permission'   => 'required',

        ]);

        $Author->update($request->all());

        return redirect('/Author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Author=Authors::find($id);
        $Author->delete();
        return redirect('/Author');
    }
}
