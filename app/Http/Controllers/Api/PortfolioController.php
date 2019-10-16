<?php

namespace App\Http\Controllers\Api;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return 'ok';
//        $portfoliosImages=Portfolio::with('portfolioImages')->orderBy('id', 'DESC')->get();
        $portfolios=Portfolio::with('portfolioImages')->orderBy('id', 'DESC')->get();
        return $portfolios;
    }



    public function existingImages($id){

        $images=PortfolioImage::where('portfolio_id', $id)->get();
        return $images;
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $images=$request->images;
//        foreach ($images as $image) {
//            dd($image['name']);
//        }




        $this->validate($request,[
            'project_name'=>'required|string|max:50',
            'project_type'=>'required|string|max:30',
            'client'=>'required|string|max:50',
            'link'=>'required|string|max:100',
            'completed'=>'required|string|max:60',
            'description'=>'required',
            'photo'=>'required',
        ]);




        if ($request->photo){
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/portfolio/');

            Image::make($request->photo)->save($directory.$name);

        }


        $portfolio=Portfolio::create([
            'project_name'=>$request->project_name,
            'project_type'=>$request->project_type,
            'link'=>$request->link,
            'client'=>$request->client,
            'completed'=>$request->completed,
            'description'=>$request->description,
            'photo'=>$name,

        ]);

        $images=$request->images;

        if ($request->images){
            foreach ($images as $image) {
                $name=$image['name'];
                $directory=public_path('images/portfolio/');
                Image::make($image['path'])->save($directory.$name);

                PortfolioImage::create([
                    'images' =>$name,
                    'portfolio_id' =>$portfolio->id
                ]);


            }
        }





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
            'project_name'=>'required|string|max:50',
            'project_type'=>'required|string|max:30',
            'client'=>'required|string|max:50',
            'link'=>'required|string|max:100',
            'completed'=>'required|string|max:60',
            'description'=>'required',
            'photo'=>'required',
        ]);

        $portfolio=Portfolio::findOrFail($id);
        if ($request->photo!==$portfolio->photo){
//            $existimage=$user->photo;
            $name=time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $directory=public_path('images/portfolio/');
            if ($portfolio->photo){
                unlink($directory.$portfolio->photo);
            }
            Image::make($request->photo)->save($directory.$name);

            $portfolio->update([
                'photo'=>$name,
            ]);

        }

//        $existingImages=PortfolioImage::where('portfolio_id', $id)->get();
//
//        if ($request->images){
//            foreach ($request->images as $image) {
//
//                foreach ($existingImages as $existingImage) {
//                    if ($request->images!==$existingImage->images){
//
//                        $name=$image['name'];
//                        $directory=public_path('images/portfolio/');
//                        if ($existingImage->images){
//                            unlink($directory.$existingImage->images);
//                        }
//                        Image::make($request->photo)->save($directory.$name);
//
//                        $existingImage->update([
//                            'images'=>$name,
//                        ]);
//
//                    }
//                }
//            }
//
//        }

        $portfolio->update($request->except('photo'));

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
        Portfolio::findOrFail($id)->delete();
        return 'ok';
    }
}
