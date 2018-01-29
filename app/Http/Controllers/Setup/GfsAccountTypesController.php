<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\GfsAccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class GfsAccountTypesController extends Controller
{
    /**
     * Display all GFS Account Types.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $gfs_account_types =  GfsAccountType::all();
        $gfs_account_types =  customPaginate($gfs_account_types, $per_page);
        return customApiResponse($gfs_account_types);
    }

    /**
     * Create a GFS Account Type.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, GfsAccountType::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = GfsAccountType::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single GFS Account Type.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $gfs_account_type = GfsAccountType::find($id);
        if ($gfs_account_type == null) {
            return customApiResponse($gfs_account_type, 'GFS Account Type Not Found', 404, 'GFS Account Type Not Found');
        }
        return customApiResponse($gfs_account_type, 'SUCCESSFULL');
    }

    /**
     * Update GFS Account Type.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, GfsAccountType::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $gfs_account_type =  GfsAccountType::find($id);
        if ($gfs_account_type == null) {
            return customApiResponse($gfs_account_type, 'GFS Account Type Not Found', 404, 'GFS Account Type Not Found');
        }

        $result =  $gfs_account_type->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating GFS Account Type ', 500);
        }
    }

    /**
     * destroy/delete GFS Account Type.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $gfs_account_type =  GfsAccountType::find($id);

        if ($gfs_account_type == null) {
            return customApiResponse($gfs_account_type, 'GFS Account Type Not Found', 404, 'GFS Account Type Not Found');
        }

        if ($gfs_account_type->delete()) {
            return customApiResponse($gfs_account_type, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($gfs_account_type, 'Error Deleting GFS Account Type', 500);
        }
    }
}
