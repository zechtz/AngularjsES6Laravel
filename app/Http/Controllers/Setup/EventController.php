<?php

namespace App\Http\Controllers\Setup;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class EventController extends Controller
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
        $events =  Event::all();
        $events =  customPaginate($events, $per_page);
        return customApiResponse($events);
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
        $validator =  Validator::make($data, Event::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = Event::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if ($event == null) {
            return customApiResponse($event, ' Not Found', 404, ' Not Found');
        }
        return customApiResponse($event, 'SUCCESSFUL');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, Event::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $event =  Event::find($id);
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event =  Event::find($id);

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
