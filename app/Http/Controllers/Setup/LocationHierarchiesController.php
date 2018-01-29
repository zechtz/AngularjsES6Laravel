<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Models\Setup\LocationHierarchy;
use App\Http\Controllers\Controller;
use Validator;

class LocationHierarchiesController extends Controller
{
    public function index(Request $request){
        $data                 = $request->all();
        $per_page             =  isset($data['per_page'])? $data['per_page'] : 15;
        $location_hierarchies = LocationHierarchy::all();
        $location_hierarchies = customPaginate($location_hierarchies,$per_page);
        return customApiResponse($location_hierarchies);
    }

    public function create(Request $request){
        $data      = $request->all();
        $validator = Validator::make($data, LocationHierarchy::$rules);

        if($validator->fails()){
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = LocationHierarchy::create($data);
        if($result){
            $per_page             =  isset($data['per_page'])? $data['per_page'] : 15;
            $location_hierarchies = LocationHierarchy::all();
            $location_hierarchies = customPaginate($location_hierarchies,$per_page);
            return customApiResponse($location_hierarchies, 'SUCCESSFULLY_CREATED', 201);
        }else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    public function show($id){
        $location_hierarchy = LocationHierarchy::find($id);
        if($location_hierarchy == null){
            return customApiResponse($location_hierarchy, 'Location hierarchy Not Found', 404, 'Institution Not Found');
        }
        $per_page             = 15;
        $location_hierarchies = LocationHierarchy::all();
        $location_hierarchies = customPaginate($location_hierarchies,$per_page);
        return customApiResponse($location_hierarchies, 'SUCCESSFULL');
    }

    public function update(Request $request, $id){
        $data      = $request->all();
        $validator = Validator::make($data, LocationHierarchy::$rules);

        if($validator->fails()){
            return customApiResponse($data,'Validation error',400,$validator->errors()->all());
        }

        $location_hierarchy = LocationHierarchy::find($id);
        if($location_hierarchy == null){
            return customApiResponse($location_hierarchy,'Location Hierarchy Not Found',404,'Location Hierarchy Not Found');
        }

        $result = $location_hierarchy->update($data);
        if($result){
            $per_page             = isset($data['per_page'])? $data['per_page'] : 15;
            $location_hierarchies = LocationHierarchy::all();
            $location_hierarchies = customPaginate($location_hierarchies,$per_page);
            return customApiResponse($location_hierarchies,'SUCCESSFULLY_UPDATED', 200);
        }else{
            return customApiResponse($result,'Error updating Location Hierarchy',500);
        }
    }

    public function destroy($id){
        $location_hierarchy = LocationHierarchy::find($id);
        if($location_hierarchy == null){
            return customApiResponse($location_hierarchy,'Location Hierarchy Not Found',404,'Location Hierarchy Not Found');
        }

        if($location_hierarchy->delete()){
            $per_page             = 15;
            $location_hierarchies = LocationHierarchy::all();
            $location_hierarchies = customPaginate($location_hierarchies,$per_page);
            return customApiResponse($location_hierarchy,'SUCCESSFULLY_DELETED',200);
        }else{
            return customApiResponse($location_hierarchy,'Error deleting location hieararchy',500);
        }
    }
}
