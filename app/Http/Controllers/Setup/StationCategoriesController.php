<?php

namespace App\Http\Controllers\Setup;
use Illuminate\Http\Request;
use App\Models\Setup\StationCategory;
use App\Http\Controllers\Controller;
use Validator;

class StationCategoriesController extends Controller
{
     /**
     * Display the all station_categories.
     * @param  Request  $request
     * @return customApiResponsegit
     */
      public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $station_categories =  StationCategory::all();
        $station_categories =  customPaginate($station_categories, $per_page);
        return customApiResponse($station_categories);
    }

    /**
     * create an station_categories.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, StationCategory::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = StationCategory::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an station_category.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $station_categories = StationCategory::find($id);
        if ($station_categories == null) {
            return customApiResponse($station_categories, 'Station Category Not Found', 404, 'Station Category Not Found');
        }
        return customApiResponse($station_categories, 'SUCCESSFULL');
    }

    /**
     * update an station_categories.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, StationCategory::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $station_categories =  StationCategory::find($id);
        if ($station_categories == null) {
            return customApiResponse($station_categories, 'Station category Not Found', 404, 'Station category Not Found');
        }

        $result =  $station_categories->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Station category ', 500);
        }
    }

    /**
     * destroy/delete an station categories.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $station_categories =  StationCategory::find($id);

        if ($station_categories == null) {
            return customApiResponse($station_categories, 'Station Category Not Found', 404, 'Station Category Not Found');
        }

        if ($station_categories->delete()) {
            return customApiResponse($station_categories, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($station_categories, 'Error Deleting Station Categories', 500);
        }
    }//
}
