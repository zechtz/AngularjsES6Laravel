<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\GfsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class GfsCategoriesController extends Controller
{
    /**
     * Display all GFS Categories.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $gfs_categories =  GfsCategory::all();
        $gfs_categories =  customPaginate($gfs_categories, $per_page);
        return customApiResponse($gfs_categories);
    }

    /**
     * Create a GFS Category.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, GfsCategory::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = GfsCategory::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single GFS Category.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $gfs_category = GfsCategory::find($id);
        if ($gfs_category == null) {
            return customApiResponse($gfs_category, 'GFS Category Not Found', 404, 'GFS Category Not Found');
        }
        return customApiResponse($gfs_category, 'SUCCESSFULL');
    }

    /**
     * Update GFS Category.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, GfsCategory::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $gfs_category =  GfsCategory::find($id);
        if ($gfs_category == null) {
            return customApiResponse($gfs_category, 'GFS Category Not Found', 404, 'GFS Category Not Found');
        }

        $result =  $gfs_category->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating GFS Category ', 500);
        }
    }

    /**
     * destroy/delete GFS Category.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $gfs_category =  GfsCategory::find($id);

        if ($gfs_category == null) {
            return customApiResponse($gfs_category, 'GFS Category Not Found', 404, 'GFS Category Not Found');
        }

        if ($gfs_category->delete()) {
            return customApiResponse($gfs_category, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($gfs_category, 'Error Deleting GFS Category', 500);
        }
    }
}
