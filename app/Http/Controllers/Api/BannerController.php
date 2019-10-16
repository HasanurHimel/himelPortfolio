<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::orderBy('id', 'DESC')->take(1)->get();
        return $banner;
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
            'site_name'=>'required|string|max:150',
            'banner_title'=>'required|string|max:150',
            'photo'=>'required',
            'publication_status'=>'required',
        ]);

        if ($request->photo){
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/banner/');

            Image::make($request->photo)->save($directory.$name);

        }


        Banner::create([
            'site_name'=>$request->site_name,
            'banner_title'=>$request->banner_title,
            'photo'=>$name,
            'publication_status'=>$request->publication_status,
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
            'site_name'=>'required|string|max:150',
            'banner_title'=>'required|string|max:150',
//            'photo'=>'required',
            'publication_status'=>'required',
        ]);

        $banner=Banner::findOrFail($id);
        if ($request->photo!==$banner->photo){
//            $existimage=$user->photo;
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/banner/');
            if ($banner->photo){
                unlink($directory.$banner->photo);
            }
            Image::make($request->photo)->save($directory.$name);

            $banner->update([
                'photo'=>$name,
            ]);

        }
        $banner->update([
            'site_name'=>$request->site_name,
            'banner_title'=>$request->banner_title,
            'publication_status'=>$request->publication_status,
        ]);

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
        Banner::findOrFail($id)->delete();
        return 'ok';
    }
}
