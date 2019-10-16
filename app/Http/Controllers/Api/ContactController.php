<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=Contact::take(1)->get();
        return $contact;
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
          'location' =>'required|min:2|max:50',
          'email' =>'required|Email' ,
          'phone' =>'required|min:10|max:20' ,
          'facebook' =>'required|min:5|max:100' ,
          'linkedin' =>'required|min:2|max:80' ,
          'twitter' =>'required|min:2|max:80' ,
          'github' =>'required|min:2|max:80' ,
       ]);

       Contact::create($request->all());

       return 'ok';


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location' =>'required|min:2|max:50',
            'email' =>'required|Email' ,
            'phone' =>'required|min:10|max:20' ,
            'facebook' =>'required|min:5|max:100' ,
            'linkedin' =>'required|min:2|max:80' ,
            'twitter' =>'required|min:2|max:80' ,
            'github' =>'required|min:2|max:80' ,
        ]);
        $contact=Contact::findOrFail($id);
        $contact->update($request->all());
        return 'ok';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return 'ok';
    }
}
