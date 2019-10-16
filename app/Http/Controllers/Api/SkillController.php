<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['skills']=Skill::orderBy('id', 'DESC')->paginate(10);
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
            'skill'=>'required|min:2|max:50|unique:skills',
            'animation'=>'required',
            'percentage'=>'required|max:100',
        ]);

        Skill::create($request->all());
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
            'skill'=>'required|min:2|max:50',
            'animation'=>'required',
            'percentage'=>'required|max:100',
        ]);

        $skill=Skill::findOrFail($id);
        $skill->update($request->all());
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
        Skill::findOrFail($id)->delete();
    }
}
