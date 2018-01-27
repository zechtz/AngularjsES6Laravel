<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstitutionsController extends Controller
{
    public function index (){
        $institutions = Institution::all();
        $institutions = customPaginate($institutions, 10);
        return customApiResponse($institutions);
    }

    public function create(Request $request){
        $data = json_decode($request->getContent());
        $institution = new Institution();
        $institution->name = $data->name;
        $institution->institution_id = $data->institution_id;
        $institution->address = $data->address;
        $institution->email = $data->email;
        $institution->phone_number = $data->phone_number;
        $institution->additional_information =$data->additional_information;
        $institution->save();
        $institutions = Institution::all();
        $institutions = customPaginate($institutions, 10);
        return customApiResponse($institutions,'SUCCESSFULLY_CREATED');
    }
    public function update(Request $request){
        $data = json_decode($request->getContent());
        $institution = Institution::find($data->id);
        $institution->name = $data->name;
        $institution->institution_id = $data->institution_id;
        $institution->address = $data->address;
        $institution->email = $data->email;
        $institution->phone_number = $data->phone_number;
        $institution->additional_information = $data->additional_information;
        $institution->save();
        $institutions = Institution::all();
        $institutions = customPaginate($institutions, 10);
        return customApiResponse($institutions,'SUCCESSFULLY_UPDATED');
    }

    public function delete(Request $request){
        $data = json_decode($request->getContent());
        $institution = Institution::find($data->id);
        $institution->delete();
        $institutions = Institution::all();
        $institutions = customPaginate($institutions, 10);
        return customApiResponse($institutions,'SUCCESSFULLY_DELETED');
    }
    public function remove(Request $request){
        $data = json_decode($request->getContent());
        $institution = Institution::find($data->id);
        $institution->delete();
        $institutions = Institution::all();
        $institutions = customPaginate($institutions, 10);
        return customApiResponse($institutions,'SUCCESSFULLY_DELETED');
    }
}
