<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\AttractionSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AttractionSitesController extends Controller
{
    /**
     * Display the all attraction sites.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $attractionSites =  AttractionSite::all();
        $attractionSites =  customPaginate($attractionSites, $per_page);
        return customApiResponse($attractionSites);
    }

    /**
     * create an attraction sites.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, AttractionSite::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AttractionSite::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get an attraction site.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $attractionSite = AttractionSite::find($id);
        if ($attractionSite == null) {
            return customApiResponse($attractionSite, 'Attraction Site Not Found', 404, 'Attraction Site Not Found');
        }
        return customApiResponse($attractionSite, 'SUCCESSFULL');
    }

    /**
     * update an attraction site.
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

        $attractionSite =  Institution::find($id);
        if ($attractionSite == null) {
            return customApiResponse($attractionSite, 'Institution Not Found', 404, 'Institution Not Found');
        }

        $result =  $attractionSite->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Attraction Site ', 500);
        }
    }

    /**
     * destroy/delete an attraction site.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $attractionSite =  AttractionSite::find($id);

        if ($attractionSite == null) {
            return customApiResponse($attractionSite, 'Attraction Site Not Found', 404, 'Attraction Site Not Found');
        }

        if ($attractionSite->delete()) {
            return customApiResponse($attractionSite, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($attractionSite, 'Error Deleting Attraction Site', 500);
        }
    }
}
