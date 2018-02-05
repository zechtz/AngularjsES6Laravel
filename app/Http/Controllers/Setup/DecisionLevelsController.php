<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\DecisionLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DecisionLevelsController extends Controller
{

    /**
     * Display the all Decision Levels.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function index (Request $request){
        $data         =  $request->all();
        $per_page     =  isset($data['per_page'])? $data['per_page'] : 15;
        $decisionLevel =  DecisionLevel::all();
        $decisionLevel =  customPaginate($decisionLevel, $per_page);
        return customApiResponse($decisionLevel);
    }

    /**
     * create decision levels.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function create(Request $request){
        $data      =  $request->all();
        $validator =  Validator::make($data, DecisionLevel::$create_rules);

        if ($validator->fails()) {
            return customApiResponse($data, "Validation Error", 400, $validator->errors()->all());
        }

        $result = DecisionLevel::create($data);

        if($result) {
            return customApiResponse($result, 'SUCCESSFULLY_CREATED', 201);
        } else {
            return customApiResponse($data, 'ERROR', 500);
        }
    }

    /**
     * get Decision Levels.
     * @param  int  $id
     * @return customApiResponse
     */
    public function show($id)
    {
        $decisionLevel = DecisionLevel::find($id);
        if ($decisionLevel == null) {
            return customApiResponse($decisionLevel, 'DecisionLevel Not Found', 404, 'DecisionLevel Not Found');
        }
        return customApiResponse($decisionLevel, 'SUCCESSFULL');
    }

    /**
     * update an Decision Levels.
     * @param  Request  $request
     * @param  int  $id
     * @return customApiResponse
     */
    public function update(Request $request, $id)
    {
        $data      = $request->all();
        $validator = Validator::make($data, DecisionLevel::$rules);

        if ($validator->fails()) {
            return customApiResponse($data, 'Validation error', 400, $validator->errors()->all());
        }

        $decisionLevel =  DecisionLevel::find($id);
        if ($decisionLevel == null) {
            return customApiResponse($decisionLevel, 'DecisionLevel Not Found', 404, 'DecisionLevel Not Found');
        }

        $result =  $decisionLevel->update($data);

        if ($result) {
            return customApiResponse($result, 'SUCCESSFULLY_UPDATED', 200);
        } else {
            return customApiResponse($data, 'Error updating DecisionLevel ', 500);
        }
    }

    /**
     * destroy/delete an Decision Level.
     * @param  Request  $request
     * @return customApiResponse
     */
    public function destroy($id){
        $decisionLevel =  DecisionLevel::find($id);

        if ($decisionLevel == null) {
            return customApiResponse($decisionLevel, 'DecisionLevel Not Found', 404, 'DecisionLevel Not Found');
        }

        if ($decisionLevel->delete()) {
            return customApiResponse($decisionLevel, 'SUCCESSFULLY_DELETED', 200);
        } else {
            return customApiResponse($decisionLevel, 'Error Deleting DecisionLevel', 500);
        }
    }
}
