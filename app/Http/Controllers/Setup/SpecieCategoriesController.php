<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\SpecieCategory;
use Validator;

class SpecieCategoriesController extends Controller
{
    /**
     * Display all the specie categories
     * @param Request $request
     * @return customApiResponse
     */
    public function index(Request $request){
        $data = $request->all();
        $per_page= isset($data['per_page'])? $data['per_page'] : 15;
        $specie_categories = SpecieCategory::all();
        $specie_categories = customPaginate($specie_categories,$per_page);
        return customApiResponse($specie_categories);
    }

    /**
     * Create a SpecieCategory
     * @param Request @request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,SpecieCategory::$rules);

        if($validator->fails()){
            return customApiResponse($data,"Validation Error",400,$validator->errors()->all());
        }

        $result = SpecieCategory::create($data);

        if($result){
            return customApiResponse($result, 'SUCCESSFULLY_CREATED',201);
        }else{
            return customApiResponse($data, 'ERROR',500);
        }
    }

    /**
     * get an Specie Category
     * @param int $id
     * @return customApiResponse 
     */
    public function show($id){
        $specice_category = SpecieCategory::find($id);
        if($specice_category == null){
            return customApiResponse($specice_category,'Specie Category Not Found',404,'Specie Category Not Found');
        }else{
            return customApiResponse($specice_category);
        }
    }

     /**
     * get specie category to update.
     * @param  int  $id
     * @return customApiResponse
     */
    public function edit($id)
    {
        $specice_category = SpecieCategory::find($id);
        if ($specice_category == null) {
            return customApiResponse($specice_category, 'Specice Category Not Found', 404, 'Specice Category Not Found');
        }
        return customApiResponse($specice_category, 'SUCCESSFULL');
    }

    /**
     * update Specie Category.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, SpecieCategory::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $specice_category =  SpecieCategory::find($id);
        if ($specice_category == null) {
            return customApiResponse($specice_category, 'Specice Category Not Found', 404, 'Specice Category Not Found');
        }

        $result =  $specice_category->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Specice Category ', 500);
        }
    }

    /**
     * destroy/delete Specice Category.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $specice_category =  SpecieCategory::find($id);

        if ($specice_category == null) {
            return customApiResponse($specice_category, 'Specice Category Not Found', 404, 'Specice Category Not Found');
        }

        if ($specice_category->delete()) {
            return customApiResponse($specice_category, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($specice_category, 'Error Deleting Specice Category', 500);
        }
    }
}
