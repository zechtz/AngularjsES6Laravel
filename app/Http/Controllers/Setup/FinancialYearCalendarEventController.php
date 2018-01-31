<?php

namespace App\Http\Controllers\Setup;

use App\FinancialYearCalendarEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class FinancialYearCalendarEventController extends Controller
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
        $values =  FinancialYearCalendarEvent::all();
        $values =  customPaginate($values, $per_page);
        return customApiResponse($values);
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
        $validator =  Validator::make($data, FinancialYearCalendarEvent::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = FinancialYearCalendarEvent::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinancialYearCalendarEvent  $financialYearCalendarEvent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = FinancialYearCalendarEvent::find($id);
        if ($event == null) {
            return customApiResponse($event, 'Not Found', 404, ' Not Found');
        }
        return customApiResponse($event, 'SUCCESSFUL');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinancialYearCalendarEvent  $financialYearCalendarEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, FinancialYearCalendarEvent::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $event =  FinancialYearCalendarEvent::find($id);
        if ($event == null) {
            return customApiResponse($event, ' Not Found', 404, ' Not Found');
        }

        $result =  $event->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating ', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinancialYearCalendarEvent  $financialYearCalendarEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event =  FinancialYearCalendarEvent::find($id);

        if ($event == null) {
            return customApiResponse($event, ' Not Found', 404, ' Not Found');
        }

        if ($event->delete()) {
            return customApiResponse($event, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($event, 'Error Deleting', 500);
        }
    }
}
