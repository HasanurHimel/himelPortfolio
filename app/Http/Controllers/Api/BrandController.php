<?php

namespace App\Http\Controllers\Api;

use App\Models\Animation;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands']=Brand::orderBy('id', 'DESC')->paginate(10);
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
        $this->validate($request,[
            'photo'=>'required',
            'animation' =>'required' ,
            'delay' =>'required|numeric|lt:0.10',
        ]);

        if ($request->photo){
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/brand/');

            Image::make($request->photo)->save($directory.$name);

        }


        Brand::create([
            'photo'=>$name,
            'animation'=>$request->animation,
            'delay'=>$request->delay,
        ]);

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
        $this->validate($request,[
            'photo'=>'required',
            'animation' =>'required' ,
            'delay' =>'required|numeric|lt:0.10',
        ]);

        $brand=Brand::findOrFail($id);
        if ($request->photo!==$brand->photo){
//            $existimage=$user->photo;
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/brand/');
            if ($brand->photo){
                unlink($directory.$brand->photo);
            }
            Image::make($request->photo)->save($directory.$name);

            $brand->update([
                'photo'=>$name,
            ]);

        }
        $brand->update($request->except('photo'));

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
        Brand::findOrFail($id)->delete();
        return 'ok';
    }
}
