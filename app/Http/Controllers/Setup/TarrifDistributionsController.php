<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\TarrifDistribution;
use Validator;

class TarrifDistributionsController extends Controller
{
    /**
     * Display the all TarrifDistributions
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data        =  $request->all();
        $per_page    =  isset($data['per_page'])? $data['per_page'] : 15;
        $tarrif_distributions =  TarrifDistribution::all();
        $tarrif_distributions =  customPaginate($tarrif_distributions, $per_page);
        return customApiResponse($tarrif_distributions);
    }

    /**
     * create an TarrifDistributions
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, TarrifDistribution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = TarrifDistribution::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an TarrifDistributions.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $tarrif_distribution = TarrifDistribution::find($id);
        if ($tarrif_distribution == null) {
            return customApiResponse($tarrif_distribution, 'Tarrif Distribution Not Found', 404, 'Tarrif Distribution Not Found');
        }
        return customApiResponse($tarrif_distribution, 'SUCCESSFULL');
    }

    /**
     * update an TarrifDistributions.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, TarrifDistribution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $tarrif =  TarrifDistribution::find($id);
        if ($tarrif == null) {
            return customApiResponse($tarrif, 'Tarrif Distribution Not Found', 404, 'Tarrif Distribution Not Found');
        }

        $result =  $tarrif->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Tarrif  Distribution', 500);
        }
    }

    /**
     * destroy/delete an TarrifDistribution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $tarrif_distribution =  TarrifDistribution::find($id);

        if ($tarrif == null) {
            return customApiResponse($tarrif_distribution, 'Tarrif Distribution Not Found', 404, 'Tarrif Distribution Not Found');
        }

        if ($tarrif_distribution->delete()) {
            return customApiResponse($tarrif_distribution, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($tarrif_distribution, 'Error Deleting Tarrif', 500);
        }
    }
}
