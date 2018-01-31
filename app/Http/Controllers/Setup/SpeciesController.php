<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Specie;
use Validator;

class SpeciesController extends Controller
{
     /**
     * Display all the species
     * @param Request $request
     * @return customApiResponse
     */
    public function index(Request $request){
        $data = $request->all();
        $per_page= isset($data['per_page'])? $data['per_page'] : 15;
        $species = Specie::all();
        $species = customPaginate($species,$per_page);
        return customApiResponse($species);
    }

    /**
     * Create a Specie
     * @param Request @request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,Specie::$rules);

        if($validator->fails()){
            return customApiResponse($data,"Validation Error",400,$validator->errors()->all());
        }

        $result = Specie::create($data);

        if($result){
            return customApiResponse($result, 'SUCCESSFULLY_CREATED',201);
        }else{
            return customApiResponse($data, 'ERROR',500);
        }
    }

    /**
     * get  Specie 
     * @param int $id
     * @return customApiResponse 
     */
    public function show($id){
        $specie = Specie::find($id);
        if($specie == null){
            return customApiResponse($specie,'Specie Not Found',404,'Specie Not Found');
        }else{
            return customApiResponse($specie);
        }
    }

     /**
     * get specie to update.
     * @param  int  $id
     * @return customApiResponse
     */
    public function edit($id)
    {
        $specie = Specie::find($id);
        if ($specie == null) {
            return customApiResponse($specie, 'Specice Not Found', 404, 'Specice Not Found');
        }
        return customApiResponse($specie, 'SUCCESSFULL');
    }

    /**
     * update Specie.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Specie::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $specie =  Specie::find($id);
        if ($specie == null) {
            return customApiResponse($specie, 'Specice Not Found', 404, 'Specice Not Found');
        }

        $result =  $specie->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Specice', 500);
        }
    }

    /**
     * destroy/delete Specice.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $specie =  Specie::find($id);

        if ($specie == null) {
            return customApiResponse($specie, 'Specice Not Found', 404, 'Specice Not Found');
        }

        if ($specie->delete()) {
            return customApiResponse($specie, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($specie, 'Error Deleting Specice', 500);
        }
    }
}
