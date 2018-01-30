<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\AttractionSiteGrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AttractionSiteGradesController extends Controller
{
    /**
     * Display the all Attraction Site Grades.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $attractionSiteGrades =  AttractionSiteGrade::all();
        $attractionSiteGrades =  customPaginate($attractionSiteGrades, $per_page);
        return customApiResponse($attractionSiteGrades);
    }

    /**
     * create an attraction site grade.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, AttractionSiteGrade::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AttractionSiteGrade::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an attraction site grade.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $attractionSiteGrade = AttractionSiteGrade::find($id);
        if ($attractionSiteGrade == null) {
            return customApiResponse($attractionSiteGrade, 'Attraction Site Grade Not Found', 404, 'Attraction Site Grade Not Found');
        }
        return customApiResponse($attractionSiteGrade, 'SUCCESSFULL');
    }

    /**
     * update an attraction site grade.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, AttractionSiteGrade::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $attractionSiteGrade =  AttractionSiteGrade::find($id);
        if ($attractionSiteGrade == null) {
            return customApiResponse($attractionSiteGrade, 'Attraction Site Grade Not Found', 404, 'Attraction Site Grade Not Found');
        }

        $result =  $attractionSiteGrade->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Attraction Site Grade ', 500);
        }
    }

    /**
     * destroy/delete an attraction site grade.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $attractionSiteGrade =  AttractionSiteGrade::find($id);

        if ($attractionSiteGrade == null) {
            return customApiResponse($attractionSiteGrade, 'Attraction Site Grade Not Found', 404, 'Attraction Site Grade Not Found');
        }

        if ($attractionSiteGrade->delete()) {
            return customApiResponse($attractionSiteGrade, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($attractionSiteGrade, 'Error Deleting Attraction Site Grade', 500);
        }
    }
}
