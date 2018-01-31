<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ApplicationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ApplicationFormsController extends Controller
{

    /**
     * Display the all application form.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $application_types =  ApplicationForm::all();
        $application_types =  customPaginate($application_types, $per_page);
        return customApiResponse($application_types);
    }

    /**
     * create application form.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, ApplicationForm::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = ApplicationForm::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an application form.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $applicationForm = ApplicationForm::find($id);
        if ($applicationForm == null) {
            return customApiResponse($applicationForm, 'ApplicationForm Not Found', 404, 'ApplicationForm Not Found');
        }
        return customApiResponse($applicationForm, 'SUCCESSFULL');
    }

    /**
     * update an application form.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, ApplicationForm::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $applicationForm =  ApplicationForm::find($id);
        if ($applicationForm == null) {
            return customApiResponse($applicationForm, 'ApplicationForm Not Found', 404, 'ApplicationForm Not Found');
        }

        $result =  $applicationForm->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating ApplicationForm ', 500);
        }
    }

    /**
     * destroy/delete an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $applicationForm =  ApplicationForm::find($id);

        if ($applicationForm == null) {
            return customApiResponse($applicationForm, 'ApplicationForm Not Found', 404, 'ApplicationForm Not Found');
        }

        if ($applicationForm->delete()) {
            return customApiResponse($applicationForm, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($applicationForm, 'Error Deleting ApplicationForm', 500);
        }
    }
}
