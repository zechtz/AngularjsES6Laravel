<?php

namespace App\Http\Controllers\Setup;

use App\CalendarEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class CalendarEventController extends Controller
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
        $calendar_event =  CalendarEvent::all();
        $events =  customPaginate($calendar_event, $per_page);
        return customApiResponse($calendar_event);
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
        $validator =  Validator::make($data, CalendarEvent::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = CalendarEvent::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = CalendarEvent::find($id);
        if ($event == null) {
            return customApiResponse($event, 'Not Found', 404, ' Not Found');
        }
        return customApiResponse($event, 'SUCCESSFUL');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Event::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $event =  CalendarEvent::find($id);
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
     * @param  \App\CalendarEvent  $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event =  CalendarEvent::find($id);

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
