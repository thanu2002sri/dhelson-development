<?php

namespace App\Http\Controllers\Api;
use App\GpsTracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use File;

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
        // $filePath = public_path("co-ordinates/".date('d-m-Y').".txt");
        // if(File::exists($filePath)){
        //     $file = File::get($filePath);
        //     return $file;
        // } else 
        // {  
        //     return "Data not exists!";   
        // }
        return GpsTracking::all();
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
        $newGpsTracking = new GpsTracking;
        $newGpsTracking->gps_status = $request->gps_status;
        $newGpsTracking->latitude = $request->latitude;
        $newGpsTracking->longtitude = $request->longtitude;
        $newGpsTracking->save();
        $data = $request->latitude.",".$request->longtitude.",".$request->gps_status;
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
        $newGpsTracking = new GpsTracking;
        $newGpsTracking->gps_status = $request->gps_status;
        $newGpsTracking->latitude = $request->latitude;
        $newGpsTracking->longtitude = $request->longtitude;
        $newGpsTracking->save();
        $data = $request->latitude.",".$request->longtitude.",".$request->gps_status;
        putLogData('gpsData', date('d-m-Y').'.txt',$data);
        return response()->json([
            'success' =>'TRUE',
            'message' => 'Gps Tracking Updated Successfully!'
        ], 200);
    }
}
