<?php

namespace App\Http\Controllers\Api;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::orderBy('id', 'DESC')->take(1)->get();
        return $about;
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
            'name'=>'required|string|max:50',
            'designation'=>'required|string|max:60',
            'details'=>'required|min:10|max:350',
            'photo'=>'required',
        ]);

        if ($request->photo){
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/about/');

            Image::make($request->photo)->save($directory.$name);

        }


        About::create([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'details'=>$request->details,
            'photo'=>$name,

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
            'name'=>'required|string|max:50',
            'designation'=>'required|string|max:60',
            'details'=>'required|min:10|max:350',
            'photo'=>'required',
        ]);

        $about=About::findOrFail($id);
        if ($request->photo!==$about->photo){
//            $existimage=$user->photo;
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/about/');
            if ($about->photo){
                unlink($directory.$about->photo);
            }
            Image::make($request->photo)->save($directory.$name);

            $about->update([
                'photo'=>$name,
            ]);

        }
        $about->update($request->except('photo'));

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
        About::findOrFail($id)->delete();
        return 'ok';
    }
}
