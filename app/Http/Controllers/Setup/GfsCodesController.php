<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\GfsCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class GfsCodesController extends Controller
{
    /**
     * Display all GFS Codes.
     * @return customApiResponse
     */
    public function index (){
        $data       =  request()->all();
        $per_page   =  isset($data['per_page'])? $data['per_page'] : 15;
        $gfs_codes  =  GfsCode::all();
        $gfs_codes  =  customPaginate($gfs_codes, $per_page);
        return customApiResponse($gfs_codes);
    }

    /**
     * Create/Store GFS Code.
     * @return customApiResponse
     */
    public function store(){
        $data      =  request()->all();
        $validator =  Validator::make($data, GfsCode::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = GfsCode::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single GFS Code.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $gfs_code = GfsCode::find($id);
        if ($gfs_code == null) {
            return customApiResponse($gfs_code, 'GFS Code Not Found', 404, 'GFS Code Not Found');
        }
        return customApiResponse($gfs_code, 'SUCCESSFULL');
    }

    /**
     * Update GFS Code.
     * @param  int  $id
     * @return customApiResponse
     */
    public function update($id)
    {
        $data      = request()->all();
        $validator = Validator::make($data, GfsCode::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $gfs_code =  GfsCode::find($id);
        if ($gfs_code == null) {
            return customApiResponse($gfs_code, 'GFS Code Not Found', 404, 'GFS Code Not Found');
        }

        $result =  $gfs_code->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating GFS Code ', 500);
        }
    }

    /**
     * destroy/delete GFS Code.
     * @return customApiResponse
     */
    public function destroy($id){
        $gfs_code =  GfsCode::find($id);

        if ($gfs_code == null) {
            return customApiResponse($gfs_code, 'GFS Code Not Found', 404, 'GFS Code Not Found');
        }

        if ($gfs_code->delete()) {
            return customApiResponse($gfs_code, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($gfs_code, 'Error Deleting GFS Code', 500);
        }
    }
}
