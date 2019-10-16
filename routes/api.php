<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::apiResource('seo', 'Api\SeoController');
Route::apiResource('banner', 'Api\BannerController');
Route::apiResource('designation', 'Api\DesignationController');
Route::apiResource('objective', 'Api\ObjectiveController');
Route::apiResource('about', 'Api\AboutController');
Route::apiResource('skill', 'Api\SkillController');
Route::apiResource('animation', 'Api\AnimationController');
Route::apiResource('experience', 'Api\ExperienceController');
Route::apiResource('offer', 'Api\OfferController');
Route::apiResource('portfolio', 'Api\PortfolioController');
Route::get('portfolio/existingImages/{id}', 'Api\PortfolioController@existingImages');
Route::apiResource('testimonial', 'Api\TestimonialController');
Route::apiResource('contact', 'Api\ContactController');
Route::apiResource('brand', 'Api\BrandController');
Route::apiResource('message', 'Api\MessageController');
Route::apiResource('portfolioPhoto', 'Api\PortfolioPhotoController');
