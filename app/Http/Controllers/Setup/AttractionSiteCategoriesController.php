<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\AttractionSiteCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class AttractionSiteCategoriesController extends Controller
{
    /**
     * Display the all attraction site categories.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $attractionSiteCategory   =  AttractionSiteCategory::all();
        $attractionSiteCategories =  customPaginate($attractionSiteCategory, $per_page);
        return customApiResponse($attractionSiteCategories);
    }

    /**
     * create a an attraction site category.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, AttractionSiteCategory::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AttractionSiteCategory::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an attraction site category.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $attractionSiteCategory = AttractionSiteCategory::find($id);
        if ($attractionSiteCategory == null) {
            return customApiResponse($attractionSiteCategory, 'Attraction Site Category Not Found', 404, 'Attraction Site Category Not Found');
        }
        return customApiResponse($attractionSiteCategory, 'SUCCESSFULL');
    }

    /**
     * update an attraction site category.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, AttractionSiteCategory::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $attractionSiteCategory =  AttractionSiteCategory::find($id);
        if ($attractionSiteCategory == null) {
            return customApiResponse($attractionSiteCategory, 'Attraction Site Category Not Found', 404, 'Attraction Site Category Not Found');
        }

        $result =  $attractionSiteCategory->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Institution ', 500);
        }
    }

    /**
     * destroy/delete an attraction site category.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $attractionSiteCategory =  AttractionSiteCategory::find($id);

        if ($attractionSiteCategory == null) {
            return customApiResponse($attractionSiteCategory, 'Attraction Site Category Not Found', 404, 'Attraction Site Category Not Found');
        }

        if ($attractionSiteCategory->delete()) {
            return customApiResponse($attractionSiteCategory, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($attractionSiteCategory, 'Error Deleting Attraction Site Category', 500);
        }
    }
}
