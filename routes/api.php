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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/robot', function (Request $request) {
        $info = $request->input('info');
        $userid = $request->input('id');
        $key = config('services.turingapi.key');
        $url = config('services.turingapi.url');
        $client = new \GuzzleHttp\Client();
        $perception = ["inputText"=>["text" => $info]];
        $userInfo = ["apiKey"=>$key,"userId"=>$userid];
        $response = $client->request('POST', $url, [
            'json' => compact("perception","userInfo")
        ]);
        return response()->json(['data' => $response->getBody()->getContents()]);
    });
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');