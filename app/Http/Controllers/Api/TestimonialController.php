<?php

namespace App\Http\Controllers\Api;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial=Testimonial::orderBy('id', 'DESC')->get();
        return $testimonial;
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
            'profession'=>'required|string|max:30',
            'testimonial'=>'required|max:600',
            'photo'=>'required',
        ]);

        if ($request->photo){
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/testimonial/');

            Image::make($request->photo)->save($directory.$name);

        }


        Testimonial::create([
            'name'=>$request->name,
            'profession'=>$request->profession,
            'testimonial'=>$request->testimonial,
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
            'profession'=>'required|string|max:30',
            'testimonial'=>'required|max:600',
            'photo'=>'required',
        ]);

        $testimonial=Testimonial::findOrFail($id);
        if ($request->photo!==$testimonial->photo){
//            $existimage=$user->photo;
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/portfolio/');
            if ($testimonial->photo){
                unlink($directory.$testimonial->photo);
            }
            Image::make($request->photo)->save($directory.$name);

            $testimonial->update([
                'photo'=>$name,
            ]);

        }
        $testimonial->update($request->except('photo'));

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
       Testimonial::findOrFail($id)->delete();
       return 'ok';
    }
}
