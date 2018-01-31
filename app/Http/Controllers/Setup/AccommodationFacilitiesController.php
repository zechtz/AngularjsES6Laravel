<?php

namespace App\Http\Controllers\Setup;

use App\AccommodationFacility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class AccommodationFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $accommodation_facilities =  AccommodationFacility::all();
        $accommodation_facilities =  customPaginate($accommodation_facilities, $per_page);
        return customApiResponse($accommodation_facilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data      =  $request->all();
        $validator =  Validator::make($data, AccommodationFacility::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AccommodationFacility::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccommodationFacility  $accommodationFacility
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accommodation_facility = AccommodationFacility::find($id);
        if ($accommodation_facility == null) {
            return customApiResponse($accommodation_facility, 'Data Not Found', 404, 'Institution Not Found');
        }
        return customApiResponse($accommodation_facility, 'SUCCESSFUL');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccommodationFacility  $accommodationFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(AccommodationFacility $accommodationFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccommodationFacility  $accommodationFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, AccommodationFacility::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $accommodation_facility =  AccommodationFacility::find($id);
        if ($accommodation_facility == null) {
            return customApiResponse($accommodation_facility, 'Not Found', 404, ' Not Found');
        }

        $result =  $accommodation_facility->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Institution ', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccommodationFacility  $accommodationFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccommodationFacility $accommodationFacility)
    {
        //
    }
}
