<?php

namespace App\Http\Controllers\Api;
use App\GpsTracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;

class GpsTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GpsTracking  $gpsTracking
     * @return \Illuminate\Http\Response
     */
    public function show(GpsTracking $gpsTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GpsTracking  $gpsTracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GpsTracking $gpsTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GpsTracking  $gpsTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(GpsTracking $gpsTracking)
    {
        //
    }

    public function gps()
    {
        return response()->json([
            'success' =>'TRUE',
            'data' => ['security_guard' => '7', 'booking_latitude' => '16.506174', 'booking_longtitude' => '80.648018', 'destination_latitude' => '17.700180', 'destination_longtitude' => '83.287659', 'status' => '0']
        ], 200);
    }

    public function gpsTracking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longtitude' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' =>'FALSE',
                'message' => $validator->errors()->first()
            ], 401);
        }
        $data = $request->latitude.",".$request->longtitude;
        putLogData('gpsData', date('d-m-Y').'.txt',$data);
        return response()->json([
            'success' =>'TRUE',
            'message' => 'Gps Tracking Updated Successfully!'
        ], 200);

        
        
        // $newGpsTracking = new GpsTracking;
        // $newGpsTracking->user_id = $request->user_id;
        // $newGpsTracking->pincode = $request->pincode;
        // $newGpsTracking->city = $request->city;
        // $newGpsTracking->state = $request->state;
        // $newGpsTracking->country = $request->country;
        // $newGpsTracking->lattitude = $request->lattitude;
        // $newGpsTracking->logtitude = $request->logtitude;
        // $newGpsTracking->save();
        
    }

    public function gpsTrackingDevice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longtitude' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' =>'FALSE',
                'message' => $validator->errors()->first()
            ], 401);
        }
        $data = $request->latitude.",".$request->longtitude;
        putLogData('gpsData', date('d-m-Y').'.txt',$data);
        return response()->json([
            'success' =>'TRUE',
            'message' => 'Gps Tracking Updated Successfully!'
        ], 200); 
    }
}
