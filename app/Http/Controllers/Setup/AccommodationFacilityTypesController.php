<?php

namespace App\Http\Controllers\Setup;
use App\AccommodationFacilityType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class AccommodationFacilityTypesController extends Controller
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
        $accommodation_facility_types =  AccommodationFacilityType::all();
        $accommodation_facility_types =  customPaginate($accommodation_facility_types, $per_page);
        return customApiResponse($accommodation_facility_types);
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
        $validator =  Validator::make($data, AccommodationFacilityType::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = AccommodationFacilityType::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccommodationFacilityType  $accommodationFacilityType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accommodation_facility_type = AccommodationFacilityType::find($id);
        if ($accommodation_facility_type == null) {
            return customApiResponse($accommodation_facility_type, 'Data Not Found', 404, 'Institution Not Found');
        }
        return customApiResponse($accommodation_facility_type, 'SUCCESSFUL');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccommodationFacilityType  $accommodationFacilityType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccommodationFacilityType $accommodationFacilityType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccommodationFacilityType  $accommodationFacilityType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, AccommodationFacilityType::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $accommodation_facility_type =  AccommodationFacilityType::find($id);
        if ($accommodation_facility_type == null) {
            return customApiResponse($accommodation_facility_type, 'Not Found', 404, ' Not Found');
        }

        $result =  $accommodation_facility_type->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Institution ', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccommodationFacilityType  $accommodationFacilityType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accommodation_facility_type =  AccommodationFacilityType::find($id);

        if ($accommodation_facility_type == null) {
            return customApiResponse($accommodation_facility_type, ' Not Found', 404, ' Not Found');
        }

        if ($accommodation_facility_type->delete()) {
            return customApiResponse($accommodation_facility_type, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($accommodation_facility_type, 'Error Deleting', 500);
        }
    }
}
