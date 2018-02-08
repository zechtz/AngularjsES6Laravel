<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\AttractionSiteGeographicalDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttractionSiteGeographicalDetailsController extends Controller
{
    /**
     * Display the all the geographical details.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data                =  $request->all();
        $per_page            =  isset($data['per_page'])? $data['per_page'] : 15;
        $geographicalDetails =  AttractionSiteGeographicalDetail::all();
        $geographicalDetails =  customPaginate($geographicalDetails, $per_page);
        return customApiResponse($geographicalDetails);
    }

    /**
     * create an institution.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, AttractionSiteGeographicalDetail::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AttractionSiteGeographicalDetail::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get a geographical detail.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $geographicalDetails = AttractionSiteGeographicalDetail::find($id);
        if ($geographicalDetails == null) {
            return customApiResponse($geographicalDetails, 'Geographical Detail Not Found', 404, 'Geographical Detail Not Found');
        }
        return customApiResponse($geographicalDetails, 'SUCCESSFUL');
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
        $validator = Validator::make($data, Institution::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $geographicalDetail =  Institution::find($id);
        if ($geographicalDetail == null) {
            return customApiResponse($geographicalDetail, 'Institution Not Found', 404, 'Institution Not Found');
        }

        $result =  $geographicalDetail->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Geographical Detail ', 500);
        }
    }

    /**
     * destroy/delete an the geographical detail.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $institution =  AttractionSiteGeographicalDetail::find($id);

        if ($institution == null) {
            return customApiResponse($institution, 'Geographical Detail Not Found', 404, 'Geographical Detail Not Found');
        }

        if ($institution->delete()) {
            return customApiResponse($institution, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($institution, 'Error Deleting Geographical Detail', 500);
        }
    }
}
