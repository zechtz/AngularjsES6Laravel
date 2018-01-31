<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Plot;
use Validator;

class PlotsController extends Controller
{
    public function index(Request $request){
        $data     = $request->all();
        $per_page = isset($data['per_page'])?$data['per_page']:15;
        $plots    = Plot::all();
        $plots    = customPaginate($plots,$per_page);
        return customApiResponse($plots,'SUCCESS');
    }

    public function create(Request $request){
        $data      = $request->all();
        $validator = Validator::make($data, Plot::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validation error',400,$validator->errors()->all());
        }
        $result = Plot::create($data);
        if($result){
            return customApiResponse($data,'SUCCESSFULLY_CREATED',201);
        }else {
            return customApiResponse($data,'ERROR',500);
        }
    }

    public function show($id){
        $plot = Plot::find($id);
        if($plot == null){
            return customApiResponse($plot,'Plot Not Found',404);
        }else {
            return customApiResponse($plot,'SUCCESSFULLY');
        }
    }

    public function update(Request $request, $id){
        $data      = $request->all();
        $validator = Validator::make($data,Plot::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validation error',400,$validator->errors()->all());
        }
        $result = Plot::update($data);
        if($result){
            return customApiResponse($result,'SUCCESSFULLY_UPDATED');
        }else {
            return customApiResponse($result,'Error updating plots',500);
        }
    }

    public function destroy($id){
        $plot = Plot::find($id);
        if($plot == null){
            return customApiResponse($plot,'Plot Not Found',404);
        }
        if($plot->delete()){
            return customApiResponse($plot,'SUCCESSFULLY_DELETED');
        }else {
            return customApiResponse($plot,'Error on deleting Plot',500);
        }
    }
}
