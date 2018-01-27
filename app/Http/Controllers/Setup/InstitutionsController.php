<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class InstitutionsController extends Controller
{
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 2;
        $institutions =  Institution::all();
        $institutions =  customPaginate($institutions, $per_page);
        return customApiResponse($institutions);
    }

    public function create(Request $request){
        $data      = $request->all();
        $validator = Validator::make($data, Institution::$create_rules);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institution = Institution::find($id);
        if ($institution != null) {
            return customApiResponse($institution, 'SUCCESSFULL');
        } else {
            return customApiResponse('', 'Institution Not Found', 404, ['Institution Not Found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Institution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $institution =  Institution::find($id);
        $result      =  $institution->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse(' ', 'Error updating Institution ', 500);
        }
    }

    public function destroy(Request $request){
        $data        =  $request->all();
        $institution =  Institution::find($data->id);
        if ($institution->delete()) {
            return customApiResponse($institution, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse('', 'Error Deleting Institution ');
        }
    }
}
