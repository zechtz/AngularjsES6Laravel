<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quota;
use Validator;

class QuotasController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        $per_page = isset($data['per_page'])?$data['per_page']:15;
        $quotas =  Quota::all();
        $quotas = customPaginate($quotas,$per_page);
        return customApiResponse($quotas,'SUCCESS');
    }

    public function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,Quota::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validation error',400,$validator->errors()->all());
        }

        $result = Quota::create($data);
        if($result){
            return customApiResponse($data,'SUCCESSFULLY_CREATED',201);
        }else {
            return customApiResponse($data,'ERROR',500);
        }
    }

    public function show($id){
        $quota = Quota::find($id);
        if($quota == null){
            return customApiResponse($quota, 'Quota Not Found',404);
        }
        return customApiResponse($quotas, 'SUCCESSFULLY');
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $validator = Validator::make($data, Quota::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validation errror',400);
        }

        $quota = Quota::find($id);
        if($quota == null){
            return customApiResponse($quota,'Quota Not Found',404);
        }
        $result = $quota->update();
        if($result){
            return customApiResponse($quota,'SUCCESSFULLY_UPDATED');
        }else {
            return customApiResponse($quota,'Error on updating quota',500);
        }
    }

    public function destroy($id){
        $quota = Quota::find($id);
        if($quota == null){
            return customApiResponse($quota,'Quota Not Found',404);
        }
        if($quota->delete()){
            return customApiResponse($quota,'SUCCESSFULLY_DELETED',200);
        }else {
            return customApiResponse($quota,'Error on deleting quota',500);
        }
    }
}
