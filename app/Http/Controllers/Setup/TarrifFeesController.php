<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\TarrifFee;
use Validator;

class TarrifFeesController extends Controller
{
    /**
     * Display the all TarrifFees
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data        =  $request->all();
        $per_page    =  isset($data['per_page'])? $data['per_page'] : 15;
        $tarrif_fees =  TarrifFee::all();
        $tarrif_fees =  customPaginate($tarrif_fees, $per_page);
        return customApiResponse($tarrif_fees);
    }

    /**
     * create an TarrifFees
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, TarrifFee::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = TarrifFee::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an TarrifFees.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $tarrif_fee = TarrifFee::find($id);
        if ($tarrif_fee == null) {
            return customApiResponse($tarrif_fee, 'Tarrif Fee Not Found', 404, 'Tarrif Fee Not Found');
        }
        return customApiResponse($tarrif_fee, 'SUCCESSFULL');
    }

    /**
     * update an TarrifFees.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, TarrifFee::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $tarrif =  TarrifFee::find($id);
        if ($tarrif == null) {
            return customApiResponse($tarrif, 'Tarrif Fee Not Found', 404, 'Tarrif Fee Not Found');
        }

        $result =  $tarrif->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Tarrif ', 500);
        }
    }

    /**
     * destroy/delete an TarrifFee.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $tarrif_fee =  TarrifFee::find($id);

        if ($tarrif == null) {
            return customApiResponse($tarrif_fee, 'Tarrif Not Found', 404, 'Tarrif Not Found');
        }

        if ($tarrif_fee->delete()) {
            return customApiResponse($tarrif_fee, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($tarrif_fee, 'Error Deleting Tarrif', 500);
        }
    }
}
