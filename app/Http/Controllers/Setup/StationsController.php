<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class StationsController extends Controller
{
    /**
     * Display all Stations.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data       =  $request->all();
        $per_page   =  isset($data['per_page'])? $data['per_page'] : 15;
        $stations  =  Station::all();
        $stations  =  customPaginate($stations, $per_page);
        return customApiResponse($stations);
    }

    /**
     * Create a Station.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Station::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Station::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single Station.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $station = Station::find($id);
        if ($station == null) {
            return customApiResponse($station, 'Station Not Found', 404, 'Station Not Found');
        }
        return customApiResponse($station, 'SUCCESSFULL');
    }

    /**
     * Update Station.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Station::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $station =  Station::find($id);
        if ($station == null) {
            return customApiResponse($station, 'Station Not Found', 404, 'Station Not Found');
        }

        $result =  $station->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Station ', 500);
        }
    }

    /**
     * @param $id
     * @return Deletes Station
     */
    public function destroy($id){
        $station =  Station::find($id);

        if ($station == null) {
            return customApiResponse($station, 'Station Not Found', 404, 'Station Not Found');
        }

        if ($station->delete()) {
            return customApiResponse($station, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($station, 'Error Deleting Station', 500);
        }
    }
}
