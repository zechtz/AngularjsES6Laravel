<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UnitsController extends Controller
{
    /**
     * Display all Units.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data       =  $request->all();
        $per_page   =  isset($data['per_page'])? $data['per_page'] : 15;
        $units  	=  Unit::all();
        $units  	=  customPaginate($units, $per_page);
        return customApiResponse($units);
    }

    /**
     * Create a Unit.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Unit::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Unit::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single Unit.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $unit = Unit::find($id);
        if ($unit == null) {
            return customApiResponse($unit, 'Unit Not Found', 404, 'Unit Not Found');
        }
        return customApiResponse($unit, 'SUCCESSFULL');
    }

    /**
     * Update Unit.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Unit::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $unit =  Unit::find($id);
        if ($unit == null) {
            return customApiResponse($unit, 'Unit Not Found', 404, 'Unit Not Found');
        }

        $result =  $unit->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Unit ', 500);
        }
    }

    /**
     * destroy/delete Unit.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $unit =  Unit::find($id);

        if ($unit == null) {
            return customApiResponse($unit, 'Unit Not Found', 404, 'Unit Not Found');
        }

        if ($unit->delete()) {
            return customApiResponse($unit, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($unit, 'Error Deleting Unit', 500);
        }
    }
}
