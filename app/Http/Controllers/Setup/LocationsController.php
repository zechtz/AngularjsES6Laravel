<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Location;
use Validator;

class LocationsController extends Controller
{
    public function index(Request $request){
        $data      = $request->all();
        $per_page  = isset($data['per_page'])?$data['per_page']:15;
        $locations = Location::all();
        $locations = customPaginate($locations,$per_page);
        return customApiResponse($locations);
    }

    public function create(Request $request){
        $data      = $request->all();
        $validator = Validator::make($data, Location::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validation Error',400,$validator->errors()->all());
        }

        $result = Location::create($data);
        if($result){
            $per_page  = isset($data['per_page'])?$data['per_page']:15;
            $locations = Location::all();
            $locations = customPaginate($locations,$per_page);
            return customApiResponse($locations,'SUCCESSFULLY_CREATED',201);
        }else {
            return customApiResponse($result,'ERROR',500);
        }
    }

    public function show($id){
        $location = Location::find($id);
        if($location == null){
            return customApiResponse($id,'Location Not Found',404);
        }
        return customApiResponse($location,'SUCCESSFULL');
    }

    public function edit($id){
        $location = Location::find($id);
        if($location == null){
            return customApiResponse($id,'Location Not Found',404);
        }
        $location->hierarchy;
        return customApiResponse($location,'SUCCESSFULL');
    }

    public function update(Request $request,$id){
        $data      = $request->all();
        $validator = Validator::make($data,Location::$rules);

        if($validator->fails()){
            return customApiResponse($data,'Validation error',400,$validator->errors()->all());
        }

        $location = Location::find($id);
        if($location == null){
            return customApiResponse($id,'Location Not Found',404);
        }
        $result = $location->update($data);
        if($result){
            $per_page  = isset($data['per_page'])?$data['per_page']:15;
            $locations = Location::all();
            $locations = customPaginate($locations,$per_page);
            return customApiResponse($locations,'SUCCESSFULLY_UPDATED',200);
        }else {
            return customApiResponse($result,'Error updating Locations',500);
        }
    }

    public function destroy($id){
        $location = Location::find($id);
        if($location == null){
            return customApiResponse($id,'Location Not Found',404);
        }

        if($location->delete()){
            $per_page  = 15;
            $locations = Location::all();
            $locations = customPaginate($locations,$per_page);
            return customApiResponse($locations,'SUCCESSFULLY_DELETED',200);
        }else {
            return customApiResponse($location,'Error deleting location',500);
        }
    }
}
