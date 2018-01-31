<?php

namespace App\Http\Controllers\Setup;

use App\FinancialYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class FinancialYearController extends Controller
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
        $financial_year =  FinancialYear::all();
        $financial_year =  customPaginate($financial_year, $per_page);
        return customApiResponse($financial_year);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data      =  $request->all();
        $validator =  Validator::make($data, FinancialYear::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = FinancialYear::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $financial_year = FinancialYear::find($id);
        if ($financial_year == null) {
            return customApiResponse($financial_year, ' Not Found', 404, ' Not Found');
        }
        return customApiResponse($financial_year, 'SUCCESSFUL');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialYear $financialYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, FinancialYear::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $financial_year =  FinancialYear::find($id);
        if ($financial_year == null) {
            return customApiResponse($financial_year, ' Not Found', 404, ' Not Found');
        }

        $result =  $financial_year->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Institution ', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $financial_year =  FinancialYear::find($id);

        if ($financial_year == null) {
            return customApiResponse($financial_year, ' Not Found', 404, ' Not Found');
        }

        if ($financial_year->delete()) {
            return customApiResponse($financial_year, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($financial_year, 'Error Deleting Institution', 500);
        }
    }
}
