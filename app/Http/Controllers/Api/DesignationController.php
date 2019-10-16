<?php

namespace App\Http\Controllers\Api;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $designation=Designation::orderBy('designation', 'DESC')->paginate(10);
      return $designation;
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
           'designation'=>'required|min:3|max:80|unique:designations'
        ]);

        Designation::create($request->all());
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
            'designation'=>'required|min:3|max:80'
        ]);

        $desgnation=Designation::findOrFail($id);
        $desgnation->update($request->all());
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
        Designation::findOrFail($id)->delete();
        return 'ok';
    }
}
