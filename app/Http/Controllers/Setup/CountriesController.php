<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setup\Country;

class CountriesController extends Controller
{
    public function index (Request $request){
        $data      =  $request->all();
        $per_page  =  isset($data['per_page'])? $data['per_page'] : 15;
        $countries =  Country::all();
        $countries =  customPaginate($countries, $per_page);
        return customApiResponse($countries);
    }

    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Country::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Country::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    public function show($id)
    {
        $country = Country::find($id);
        if ($country == null) {
            return customApiResponse($country, 'Country  Not Found', 404, 'Country  Not Found');
        }
        return customApiResponse($country, 'SUCCESSFULL');
    }

    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Country::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $country =  Country::find($id);
        if ($country == null) {
            return customApiResponse($country, 'Country Not Found', 404, 'Country Not Found');
        }

        $result =  $country->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating country group ', 500);
        }
    }

    public function destroy($id){
        $country =  Country::find($id);
        if ($country == null) {
            return customApiResponse($country, ' Not Found', 404, ' Not Found');
        }

        if ($country->delete()) {
            return customApiResponse($country, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($country, 'Error Deleting', 500);
        }
    }
}
