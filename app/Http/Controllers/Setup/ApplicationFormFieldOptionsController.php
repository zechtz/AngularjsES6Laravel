<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ApplicationFormFieldOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ApplicationFormFieldOptionsController extends Controller
{

    /**
     * Display the all application form field option.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $applicationFormFieldOption =  ApplicationFormFieldOption::all();
        $applicationFormFieldOption =  customPaginate($applicationFormFieldOption, $per_page);
        return customApiResponse($applicationFormFieldOption);
    }

    /**
     * create application form field.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, ApplicationFormFieldOption::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = ApplicationFormFieldOption::create($data);

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
        $applicationFormFieldOption = ApplicationFormFieldOption::find($id);
        if ($applicationFormFieldOption == null) {
            return customApiResponse($applicationFormFieldOption, 'Application Form Field Option Not Found', 404, 'ApplicationFormFieldOption Not Found');
        }
        return customApiResponse($applicationFormFieldOption, 'SUCCESSFULL');
    }

    /**
     * update an application form field option.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, ApplicationFormFieldOption::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $applicationFormFieldOption =  ApplicationFormFieldOption::find($id);
        if ($applicationFormFieldOption == null) {
            return customApiResponse($applicationFormFieldOption, 'Application Form Field Option Not Found', 404, 'Application Form Field Option Not Found');
        }

        $result =  $applicationFormFieldOption->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Application Form Field Option ', 500);
        }
    }

    /**
     * destroy/delete an Application Form Field.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $applicationFormFieldOption =  ApplicationFormFieldOption::find($id);

        if ($applicationFormFieldOption == null) {
            return customApiResponse($applicationFormFieldOption, 'Application Form Field Option Not Found', 404, 'Application Form Field Option Not Found');
        }

        if ($applicationFormFieldOption->delete()) {
            return customApiResponse($applicationFormFieldOption, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($applicationFormFieldOption, 'Error Deleting ApplicationFormFieldOption', 500);
        }
    }
}
