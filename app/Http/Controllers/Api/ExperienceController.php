<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['experiences']=Experience::orderBy('id', 'DESC')->paginate(10);
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
           'experience' =>'required|min:2|max:100' ,
           'institution' =>'required|min:2|max:150' ,
           'details' =>'required|min:2|max:300' ,
           'animation' =>'required' ,
           'delay' =>'required|numeric|lt:0.10',
           'publication_status' =>'required' ,
        ]);

        Experience::create($request->all());
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
            'experience' =>'required|min:2|max:100' ,
            'institution' =>'required|min:2|max:150' ,
            'details' =>'required|min:2|max:300' ,
            'animation' =>'required' ,
            'delay' =>'required|numeric|lt:0.10',
            'publication_status' =>'required' ,

        ]);

        $experience=Experience::findOrFail($id);
        $experience->update($request->all());
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
        Experience::findOrFail($id)->delete();
        return 'ok';
    }
}
