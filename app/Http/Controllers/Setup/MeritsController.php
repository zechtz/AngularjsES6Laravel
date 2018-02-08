<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Merit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class MeritsController extends Controller
{
    /**
     * Display the all Merits.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $merits =  Merit::all();
        $merits =  customPaginate($merits, $per_page);
        return customApiResponse($merits);
    }

    /**
     * create an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Merit::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Merit::create($data);

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
        $merit = Merit::find($id);
        if ($merit == null) {
            return customApiResponse($merit, 'Merit Not Found', 404, 'Merit Not Found');
        }
        return customApiResponse($merit, 'SUCCESSFULL');
    }

    /**
     * update an institution.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Merit::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $merit =  Merit::find($id);
        if ($merit == null) {
            return customApiResponse($merit, 'Merit Not Found', 404, 'Merit Not Found');
        }

        $result =  $merit->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Merit ', 500);
        }
    }

    /**
     * destroy/delete an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $merit =  Merit::find($id);

        if ($merit == null) {
            return customApiResponse($merit, 'Merit Not Found', 404, 'Merit Not Found');
        }

        if ($merit->delete()) {
            return customApiResponse($merit, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($merit, 'Error Deleting Merit', 500);
        }
    }
}
