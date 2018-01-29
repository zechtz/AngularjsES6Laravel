<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class InstitutionsController extends Controller
{
    /**
     * Display the all institutions.
     *
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $institutions =  Institution::all();
        $institutions =  customPaginate($institutions, $per_page);
        return customApiResponse($institutions);
    }

    /**
     * create an institution.
     *
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Institution::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Institution::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an institution.
     *
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $institution = Institution::find($id);
        if ($institution == null) {
            return customApiResponse($institution, 'Institution Not Found', 404, 'Institution Not Found');
        }
        return customApiResponse($institution, 'SUCCESSFULL');
    }

    /**
     * update an institution.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Institution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $institution =  Institution::find($id);
        if ($institution == null) {
            return customApiResponse($institution, 'Institution Not Found', 404, 'Institution Not Found');
        }

        $result =  $institution->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Institution ', 500);
        }
    }

    /**
     * destroy/delete an institution.
     *
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $institution =  Institution::find($id);

        if ($institution == null) {
            return customApiResponse($institution, 'Institution Not Found', 404, 'Institution Not Found');
        }

        if ($institution->delete()) {
            return customApiResponse($institution, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($institution, 'Error Deleting Institution', 500);
        }
    }
}
