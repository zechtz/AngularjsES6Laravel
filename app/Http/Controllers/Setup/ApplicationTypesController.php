<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ApplicationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ApplicationTypesController extends Controller
{
    /**
     * Display the all institutions.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $application_types =  ApplicationType::all();
        $application_types =  customPaginate($application_types, $per_page);
        return customApiResponse($application_types);
    }

    /**
     * create an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, ApplicationType::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = ApplicationType::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an institution.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $institution = ApplicationType::find($id);
        if ($institution == null) {
            return customApiResponse($institution, 'ApplicationType Not Found', 404, 'ApplicationType Not Found');
        }
        return customApiResponse($institution, 'SUCCESSFULL');
    }

    /**
     * update an institution.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, ApplicationType::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $institution =  ApplicationType::find($id);
        if ($institution == null) {
            return customApiResponse($institution, 'ApplicationType Not Found', 404, 'ApplicationType Not Found');
        }

        $result =  $institution->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating ApplicationType ', 500);
        }
    }

    /**
     * destroy/delete an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $institution =  ApplicationType::find($id);

        if ($institution == null) {
            return customApiResponse($institution, 'ApplicationType Not Found', 404, 'ApplicationType Not Found');
        }

        if ($institution->delete()) {
            return customApiResponse($institution, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($institution, 'Error Deleting ApplicationType', 500);
        }
    }
}
