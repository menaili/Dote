<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
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
        $validated = Validator::make($request->all(),
        [
            'phone' => 'required|numeric|min:0',
            'email' => 'required|min:1|max:255',
            'location' => 'required|min:1|max:255',

        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{
        
            $contact= Contact::create([
            'curriculum_id'=>$request->curriculum_id,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'location'=>$request->location,

        ]);


        if ($contact->wasRecentlyCreated) {

            return $this->success($contact);
        
        } else {
            
            return response()->json(['error' => 'Failed to create contact'], 500);
        }

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
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
    public function edit(Contact $contact)
    {
        $contact_edit=Contact::findorFail($contact);
        return $contact_edit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = Validator::make($request->all(),
        [
            'phone' => 'required|numeric|min:0',
            'email' => 'required|min:1|max:255',
            'location' => 'required|min:1|max:255',

        ]);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

        try{
        $contact = Contact::findorFail($request->id);
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->location = $request->location;
        $contact->save();
        return $this->success($contact);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return null;       
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, Request $request)
    {
        Contact::where('id', $request->id)->delete();

    }
}
