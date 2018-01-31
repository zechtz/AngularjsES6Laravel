<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ReserveDistribution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveDistributionsController extends Controller
{
    /**
     * Display the all Reserve Distributions.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $reserve_distributions =  ReserveDistribution::all();
        $reserve_distributions =  customPaginate($reserve_distributions, $per_page);
        return customApiResponse($reserve_distributions);
    }

    /**
     * create an Reserve Distributions.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, ReserveDistribution::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = ReserveDistribution::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get a Reserve Distributions.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $reserve_distributions = ReserveDistribution::find($id);
        if ($reserve_distributions == null) {
            return customApiResponse($reserve_distributions, 'Reserve Distributions Not Found', 404, 'Reserve Distributions Not Found');
        }
        return customApiResponse($reserve_distributions, 'SUCCESSFULL');
    }

    /**
     * update a Reserve Distributions.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, ReserveDistribution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $reserve_distributions =  ReserveDistribution::find($id);
        if ($reserve_distributions == null) {
            return customApiResponse($reserve_distributions, 'Reserve Distributions Not Found', 404, 'Reserve Distributions Not Found');
        }

        $result =  $reserve_distributions->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Reserve Distributions ', 500);
        }
    }

    /**
     * destroy/delete an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $reserve_distributions =  ReserveDistribution::find($id);

        if ($reserve_distributions == null) {
            return customApiResponse($reserve_distributions, 'Reserve Distributions Not Found', 404, 'Reserve Distributions Not Found');
        }

        if ($reserve_distributions->delete()) {
            return customApiResponse($reserve_distributions, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($reserve_distributions, 'Error Deleting Reserve Distributions', 500);
        }
    }
}
