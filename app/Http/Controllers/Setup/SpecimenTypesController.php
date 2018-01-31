<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\SpecimenType;
use Validator;

class SpecimenTypesController extends Controller
{
     /**
     * Display all specimen types
     * @param Request $request
     * @return customApiResponse
     */
    public function index(Request $request){
        $data = $request->all();
        $per_page= isset($data['per_page'])? $data['per_page'] : 15;
        $specimen_types = SpecimenType::all();
        $specimen_types = customPaginate($specimen_types,$per_page);
        return customApiResponse($specimen_types);
    }

    /**
     * Create a Specimen Type
     * @param Request @request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,SpecimenType::$rules);

        if($validator->fails()){
            return customApiResponse($data,"Validation Error",400,$validator->errors()->all());
        }

        $result = SpecimenType::create($data);

        if($result){
            return customApiResponse($result, 'SUCCESSFULLY_CREATED',201);
        }else{
            return customApiResponse($data, 'ERROR',500);
        }
    }

    /**
     * get a Specimen Type
     * @param int $id
     * @return customApiResponse 
     */
    public function show($id){
        $specimen_type = SpecimenType::find($id);
        if($specimen_type == null){
            return customApiResponse($specimen_type,'Specimen Type Not Found',404,'SpecimenType Not Found');
        }else{
            return customApiResponse($specimen_type);
        }
    }

     /**
     * get Specimen Type to update.
     * @param  int  $id
     * @return customApiResponse
     */
    public function edit($id)
    {
        $specimen_type = SpecimenType::find($id);
        if ($specimen_type == null) {
            return customApiResponse($specimen_type, 'Specimen Type Not Found', 404, 'SpecimenType Not Found');
        }
        return customApiResponse($specimen_type, 'SUCCESSFULL');
    }

    /**
     * update Specimen Type.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, SpecimenType::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $specimen_type =  SpecimenType::find($id);
        if ($specimen_type == null) {
            return customApiResponse($specimen_type, 'Specimen Type Not Found', 404, 'SpecimenType Not Found');
        }

        $result =  $specimen_type->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Specimen Type ', 500);
        }
    }

    /**
     * destroy/delete Specimen Type.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $specimen_type =  SpecimenType::find($id);

        if ($specimen_type == null) {
            return customApiResponse($specimen_type, 'Specimen Type Not Found', 404, 'Specimen Type Not Found');
        }

        if ($specimen_type->delete()) {
            return customApiResponse($specimen_type, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($specimen_type, 'Error Deleting Specimen Type', 500);
        }
    }
}
