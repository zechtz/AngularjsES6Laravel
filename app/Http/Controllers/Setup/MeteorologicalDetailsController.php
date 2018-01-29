<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\MeteorologicalDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class MeteorologicalDetailsController extends Controller
{
    /**
     * Display the all meteorological details.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $meteorologicalDetails =  MeteorologicalDetail::all();
        $meteorologicalDetails =  customPaginate($meteorologicalDetails, $per_page);
        return customApiResponse($meteorologicalDetails);
    }

    /**
     * create a meteorological detail.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, MeteorologicalDetail::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = MeteorologicalDetail::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an institution.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $meteorologicalDetails = MeteorologicalDetail::find($id);
        if ($meteorologicalDetails == null) {
            return customApiResponse($meteorologicalDetails, 'Meteorological Detail Not Found', 404, 'Meteorological Details Not Found');
        }
        return customApiResponse($meteorologicalDetails, 'SUCCESSFULL');
    }

    /**
     * update a meteorological detail.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, MeteorologicalDetail::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $meteorologicalDetail =  MeteorologicalDetail::find($id);
        if ($meteorologicalDetail == null) {
            return customApiResponse($meteorologicalDetail, 'Meteorological Detail Not Found', 404, 'Meteorological Detail Not Found');
        }

        $result =  $meteorologicalDetail->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Meteorological Detail ', 500);
        }
    }

    /**
     * destroy/delete a meteorological detail.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $meteorologicalDetail =  MeteorologicalDetail::find($id);

        if ($meteorologicalDetail == null) {
            return customApiResponse($meteorologicalDetail, 'Meteorological Detail Not Found', 404, 'Meteorological Detail Not Found');
        }

        if ($meteorologicalDetail->delete()) {
            return customApiResponse($meteorologicalDetail, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($meteorologicalDetail, 'Error Deleting Meteorological Detail', 500);
        }
    }
}
