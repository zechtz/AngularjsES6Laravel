<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\TarrifDistributionRate;
use Validator;

class TarrifDistributionRatesController extends Controller
{
    /**
     * Display the all TarrifDistributionsRates
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data                      =  $request->all();
        $per_page                  =  isset($data['per_page'])? $data['per_page'] : 15;
        $tarrif_distribution_rates =  TarrifDistributionRate::all();
        $tarrif_distribution_rates =  customPaginate($tarrif_distribution_rates, $per_page);
        return customApiResponse($tarrif_distribution_rates, 'SUCCESSFULL', 200);
    }

    /**
     * create an TarrifDistributionRate
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, TarrifDistributionRate::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = TarrifDistributionRate::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an TarrifDistributionRate.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $tarrif_distribution_rate = TarrifDistributionRate::find($id);
        if ($tarrif_distribution_rate == null) {
            return customApiResponse($tarrif_distribution_rate, 'Tarrif Distribution Rate Not Found', 404, 'Tarrif Distribution Rate Not Found');
        }
        return customApiResponse($tarrif_distribution_rate, 'SUCCESSFULL');
    }

    /**
     * update an TarrifDistributionRate.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, TarrifDistributionRate::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $tarrif_distribution_rate =  TarrifDistributionRate::find($id);
        if ($tarrif_distribution_rate == null) {
            return customApiResponse($tarrif_distribution_rate, 'Tarrif Distribution Rate Not Found', 404, 'Tarrif Distribution Rate Not Found');
        }

        $result =  $tarrif->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Tarrif  Distribution Rate', 500);
        }
    }

    /**
     * destroy/delete an TarrifDistributionRate.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $tarrif_distribution_rate =  TarrifDistributionRate::find($id);

        if ($tarrif == null) {
            return customApiResponse($tarrif_distribution_rate, 'Tarrif Distribution Rate Not Found', 404, 'Tarrif Distribution Rate Not Found');
        }

        if ($tarrif_distribution_rate->delete()) {
            return customApiResponse($tarrif_distribution_rate, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($tarrif_distribution_rate, 'Error Deleting Tarrif', 500);
        }
    }
}
