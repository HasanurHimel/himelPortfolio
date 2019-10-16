<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['offers']=Offer::orderBy('id', 'DESC')->paginate(10);
        $data['animations']=Animation::orderBy('animation', 'ASC')->get();
        return $data;

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
            'offer_name' =>'required|min:2|max:30|unique:offers',
            'offer_description' =>'required|min:5|max:120|unique:offers',
            'icon' =>'required|min:2|max:30|unique:offers',
            'delay' =>'required|numeric|lt:0.10',
            'publication_status' =>'required',

        ]);
        Offer::create($request->all());
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
            'offer_name' =>'required|min:2|max:30',
            'offer_description' =>'required|min:5|max:120',
            'icon' =>'required|min:2|max:30',
            'delay' =>'required|numeric|lt:0.10',
            'publication_status' =>'required',

        ]);
        $offer=Offer::findOrFail($id);
        $offer->update($request->all());
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
        Offer::findOrFail($id)->delete();
        return 'ok';
    }
}
