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
Route::middleware('auth:api')->post('/user', function (Request $request) {
  return $request->user();
});

Route::post('/gps-tracking', 'Api\GpsTrackingController@gpsTracking'); 
Route::get('/gps-tracking-device', 'Api\GpsTrackingController@gpsTrackingDevice'); 


Route::get('/gps', 'Api\GpsTrackingController@gps'); 