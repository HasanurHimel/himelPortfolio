<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['objectives']=Objective::orderBy('id', 'DESC')->paginate(10);
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
           'objective_name' =>'required|min:2|max:30|unique:objectives',
           'objective_description' =>'required|min:5|max:120|unique:objectives',
           'icon' =>'required|min:2|max:30|unique:objectives',
            'delay' =>'required|numeric|lt:0.10',
           'publication_status' =>'required',

        ]);
        Objective::create($request->all());
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
            'objective_name' =>'required|min:2|max:30',
            'objective_description' =>'required|min:5|max:120',
            'icon' =>'required|min:2|max:30',
            'delay' =>'required|numeric|lt:0.10',
            'publication_status' =>'required',

        ]);
        $objective=Objective::findOrFail($id);
        $objective->update($request->all());
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
        Objective::findOrFail($id)->delete();
        return 'ok';
    }
}
