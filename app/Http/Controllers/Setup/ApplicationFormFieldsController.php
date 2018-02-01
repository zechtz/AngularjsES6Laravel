<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ApplicationFormField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ApplicationFormFieldsController extends Controller
{

    /**
     * Display the all application form field.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $applicationFormField =  ApplicationFormField::all();
        $applicationFormField =  customPaginate($applicationFormField, $per_page);
        return customApiResponse($applicationFormField);
    }

    /**
     * create application form field.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, ApplicationFormField::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = ApplicationFormField::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an application form field.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $applicationFormField = ApplicationFormField::find($id);
        if ($applicationFormField == null) {
            return customApiResponse($applicationFormField, 'ApplicationFormField Not Found', 404, 'ApplicationFormField Not Found');
        }
        return customApiResponse($applicationFormField, 'SUCCESSFULL');
    }

    /**
     * update an application form field.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, ApplicationFormField::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $applicationFormField =  ApplicationFormField::find($id);
        if ($applicationFormField == null) {
            return customApiResponse($applicationFormField, 'ApplicationFormField Not Found', 404, 'ApplicationFormField Not Found');
        }

        $result =  $applicationFormField->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating ApplicationFormField ', 500);
        }
    }

    /**
     * destroy/delete an Application Form Field.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $applicationFormField =  ApplicationFormField::find($id);

        if ($applicationFormField == null) {
            return customApiResponse($applicationFormField, 'ApplicationFormField Not Found', 404, 'ApplicationFormField Not Found');
        }

        if ($applicationFormField->delete()) {
            return customApiResponse($applicationFormField, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($applicationFormField, 'Error Deleting ApplicationFormField', 500);
        }
    }
}
