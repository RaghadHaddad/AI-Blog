<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Admins=Admins::all();
        return view('contact.Admin',compact('Admins'));
    }

    /**index for api */
    public function index_api(){
        $Admins=Admins::all();
        return response( $Admins);
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
        $input_admin=$request->all();
        /***للتأكد من التسجيل مسبقاً */
        $input_exsit = Admins::where('name','=', $input_admin['name'])->exists();

        if( $input_exsit){
            session()->flash('Error', ' The name is already registered');
            return redirect('/Admin');
        }
        else{
            Admins::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'facebook'  => $request->facebook,
                'linkeden'  => $request->linkeden,
                'twitter'   => $request->twitter,
                'instagram' => $request->instagram,
            ]);
            session()->flash('Add', 'Name added successfully');
            return redirect('/Admin');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Admins=Admins::find($id);

        return view('contact.edit_admin',compact('Admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Admins=Admins::find($id);

        $request->validate([
            'name'      => 'required',
            'email'     =>'required',
            'phone'     => 'required',
            'facebook'  => 'required',
            'linkeden'  => 'required',
            'twitter'   => 'required',
            'instagram' => 'required',
        ]);

        $Admins->update($request->all());

        return redirect('/Admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Admins=Admins::find($id);
        $Admins->delete();
        return redirect('/Admin');
    }
}
