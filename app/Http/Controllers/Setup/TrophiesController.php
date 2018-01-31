<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Trophy;
use Validator;

class TrophiesController extends Controller
{
     /**
     * Display all trophies
     * @param Request $request
     * @return customApiResponse
     */
    public function index(Request $request){
        $data = $request->all();
        $per_page= isset($data['per_page'])? $data['per_page'] : 15;
        $trophies = Trophy::all();
        $trophies = customPaginate($trophies,$per_page);
        return customApiResponse($trophies);
    }

    /**
     * Create a Trophy
     * @param Request @request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,Trophy::$rules);

        if($validator->fails()){
            return customApiResponse($data,"Validation Error",400,$validator->errors()->all());
        }

        $result = Trophy::create($data);

        if($result){
            return customApiResponse($result, 'SUCCESSFULLY_CREATED',201);
        }else{
            return customApiResponse($data, 'ERROR',500);
        }
    }

    /**
     * get a Trophy
     * @param int $id
     * @return customApiResponse 
     */
    public function show($id){
        $trophy = Trophy::find($id);
        if($trophy == null){
            return customApiResponse($trophy,'Trophy Not Found',404,'Trophy Not Found');
        }else{
            return customApiResponse($trophy);
        }
    }

     /**
     * get trophy to update.
     * @param  int  $id
     * @return customApiResponse
     */
    public function edit($id)
    {
        $trophy = Trophy::find($id);
        if ($trophy == null) {
            return customApiResponse($trophy, 'Trophy Not Found', 404, 'Trophy Not Found');
        }
        return customApiResponse($trophy, 'SUCCESSFULL');
    }

    /**
     * update trophy.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Trophy::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $trophy =  Trophy::find($id);
        if ($trophy == null) {
            return customApiResponse($trophy, 'Trophy Not Found', 404, 'Trophy Not Found');
        }

        $result =  $trophy->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating trophy ', 500);
        }
    }

    /**
     * destroy/delete Trophy.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $trophy =  Trophy::find($id);

        if ($trophy == null) {
            return customApiResponse($trophy, 'Trophy Not Found', 404, 'Trophy Not Found');
        }

        if ($trophy->delete()) {
            return customApiResponse($trophy, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($trophy, 'Error Deleting Trophy', 500);
        }
    }
}
