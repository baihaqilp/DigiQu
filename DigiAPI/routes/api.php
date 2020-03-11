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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kitabs', 'KitabsController@index');
Route::get('kitabs/download/{link}', function($link){
    $file= public_path(). "/kitab_file/".$link.".pdf";

    $headers =  [
                    'Content-Type' => 'application/pdf',
                ];

    return response()->download($file, $link.'.pdf', $headers);
            });