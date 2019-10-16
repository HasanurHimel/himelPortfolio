<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimationController extends Controller
{
    public function index()
    {
        $animation=Animation::orderBy('Animation', 'DESC')->paginate(10);
        return $animation;
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
            'animation'=>'required|min:3|max:80|unique:animations'
        ]);

        Animation::create($request->all());
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
            'animation'=>'required|min:3|max:80'
        ]);

        $animation=Animation::findOrFail($id);
        $animation->update($request->all());
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
        Animation::findOrFail($id)->delete();
        return 'ok';
    }
}
