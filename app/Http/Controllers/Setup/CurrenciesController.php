<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CurrenciesController extends Controller
{
    /**
     * Display all Currencies.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data       =  $request->all();
        $per_page   =  isset($data['per_page'])? $data['per_page'] : 15;
        $currencies  	=  Currency::all();
        $currencies  	=  customPaginate($currencies, $per_page);
        return customApiResponse($currencies);
    }

    /**
     * Create a Currency.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, Currency::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Currency::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Get Single Currency.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $currency = Currency::find($id);
        if ($currency == null) {
            return customApiResponse($currency, 'Currency Not Found', 404, 'Currency Not Found');
        }
        return customApiResponse($currency, 'SUCCESSFULL');
    }

    /**
     * Update Currency.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Currency::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $currency =  Currency::find($id);
        if ($currency == null) {
            return customApiResponse($currency, 'Currency Not Found', 404, 'Currency Not Found');
        }

        $result =  $currency->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating Currency ', 500);
        }
    }

    /**
     * destroy/delete Currency.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $currency =  Currency::find($id);

        if ($currency == null) {
            return customApiResponse($currency, 'Currency Not Found', 404, 'Currency Not Found');
        }

        if ($currency->delete()) {
            return customApiResponse($currency, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($currency, 'Error Deleting Currency', 500);
        }
    }
}
