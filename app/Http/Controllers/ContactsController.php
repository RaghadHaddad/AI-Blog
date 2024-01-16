<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Opinion;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=contacts::all();
        return view('contact.message',compact('contact'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        /**To move from the messages table to the opinions table */
        $contact=contacts::find($id);
        Opinion::create([
            'first_name' => $contact->first_name,
            'last_name' => $contact->last_name,
            'email' => $contact->email,
            'message' => $contact->message,
        ]);
        $contact->delete();
        return redirect()->route('Opinion.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contact=contacts::find($id);

        $contact->delete();
        return redirect()->route('Message.index');
    }

    public function Add_to_Opinoin( $id)
    {

    }
}
