<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\CountryGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryGroupsController extends Controller
{
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $country_groups =  CountryGroup::all();
        $country_groups =  customPaginate($country_groups, $per_page);

//        $country_groups = new CountryGroup();
//        return customApiResponse($country_groups->get_country_groups());
        return customApiResponse($country_groups);
    }

    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, CountryGroup::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = CountryGroup::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    public function show($id)
    {
        $country_group = CountryGroup::find($id);
        if ($country_group == null) {
            return customApiResponse($country_group, 'Country Group Not Found', 404, 'Country Group  Not Found');
        }
        return customApiResponse($country_group, 'SUCCESSFULL');
    }

    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, CountryGroup::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $country_croup =  CountryGroup::find($id);
        if ($country_croup == null) {
            return customApiResponse($country_croup, 'Country Group  Not Found', 404, 'Country Group  Not Found');
        }

        $result =  $country_croup->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating country group ', 500);
        }
    }

    public function destroy($id){
        $country_group =  CountryGroup::find($id);
        if ($country_group == null) {
            return customApiResponse($country_group, ' Not Found', 404, ' Not Found');
        }

        if ($country_group->delete()) {
            return customApiResponse($country_group, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($country_group, 'Error Deleting', 500);
        }
    }
}
