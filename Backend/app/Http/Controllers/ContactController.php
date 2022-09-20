<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::latest()->get();
        return view('Contact.index', compact('contact'));
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
        $this->validate($request, [
            'email' => 'required',
            'phone_number' => 'required',
            'location' => 'required',
            'whatsapp' => 'required',
        ],[
                'email.required' => 'Email Is Required',
                'phone_number.required' => 'Phone Number Is Required',
                'location.required' => 'Location Is Required',
                'whatsapp.required' => 'Whatsapp Is Required',

        ]);
        $contact = new Contact;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->location = $request->location;
        $contact->whatsapp = $request->whatsapp;
        $contact->facebook = $request->facebook;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->Status = "Active";
        $contact->save();
        return response()->json(['success' => 'Data Add successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->location = $request->location;
        $contact->whatsapp = $request->whatsapp;
        $contact->facebook = $request->facebook;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->update();
        return response()->json($contact);


    }
    public function statuschange($id, $status)
    {
        $contact = Contact::find($id);
        $contact->status = $status;
        $contact->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
