<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Tarrif;
use Validator;

class TarrifsController extends Controller
{
    /**
     * Display the all Tarrifs.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data     =  $request->all();
        $per_page =  isset($data['per_page'])? $data['per_page'] : 15;
        $tarrifs  =  Tarrif::all();
        $tarrifs  =  customPaginate($tarrifs, $per_page);
        return customApiResponse($tarrifs);
    }

    /**
     * create an Tarrif.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Tarrif::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Tarrif::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an Tarrif.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $tarrif = Tarrif::find($id);
        if ($tarrif == null) {
            return customApiResponse($tarrif, 'Tarrif Not Found', 404, 'Tarrif Not Found');
        }
        return customApiResponse($tarrif, 'SUCCESSFULL');
    }

    /**
     * update an Tarrif.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Tarrif::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $tarrif =  Tarrif::find($id);
        if ($tarrif == null) {
            return customApiResponse($tarrif, 'Tarrif Not Found', 404, 'Tarrif Not Found');
        }

        $result =  $tarrif->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Tarrif ', 500);
        }
    }

    /**
     * destroy/delete an Tarrif.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $tarrif =  Tarrif::find($id);

        if ($tarrif == null) {
            return customApiResponse($tarrif, 'Tarrif Not Found', 404, 'Tarrif Not Found');
        }

        if ($tarrif->delete()) {
            return customApiResponse($tarrif, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($tarrif, 'Error Deleting Tarrif', 500);
        }
    }
}
