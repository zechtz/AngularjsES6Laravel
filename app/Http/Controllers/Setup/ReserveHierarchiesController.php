<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\ReserveHierarchy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ReserveHierarchiesController extends Controller
{
    /**
     * @param Request $request
     * @return reserve hierarchies
     */
    public function index(Request $request)
    {
        $data= $request->all();
        $per_page=isset($data['per_page'])?$data['per_page']:15;
        $reserve_hierarchies= ReserveHierarchy::all();
        $reserve_hierarchies=customPaginate($reserve_hierarchies,$per_page);
        return customApiResponse($reserve_hierarchies);
    }

    /**
     * creates reserve hierarchies
     * @param Request $request
     * @return customApiResponse
     */
    public function create(Request $request)
    {
        $data=$request->all();
        $validator=Validator::make($data,ReserveHierarchy::$create_rules);

        if ($validator->fails()){
            return customApiResponse($data,'Validation Error',400,$validator->errors()->all());
        }

        $result = ReserveHierarchy::create($data);

        if($result){
            return customApiResponse($result,'SUCCESSFULLY_CREATED',201);
        }else{
            return customApiResponse($data,'ERROR',500);
        }
    }

    /**
     * Get single reserve hierarchy
     * @param int $id
     * @return customApiResponse
     * */
    public function show($id)
    {
        $reserve_hierarchy = ReserveHierarchy::find($id);
        if($reserve_hierarchy==null){
            return customApiResponse($reserve_hierarchy,'Reserve Hierarchy Not Found',404,'Reserve Not Found');
        }
        return customApiResponse($reserve_hierarchy,'SUCCESFULL');
    }

    /**
     * Update Reserve Hierarchy
     * @param Request $request
     * @param $id
     * @return customApiResponse
     */
    public function update(Request $request,$id)
    {
        $data = $request->all();
        $validator=Validator::make($data,ReserveHierarchy::$rules);
        if($validator->fails()){
            return customApiResponse($data,'Validator error',400,$validator->errors()->all());
        }
        $reserve_hierarchy=ReserveHierarchy::find($id);
        if($reserve_hierarchy==null){
            return customApiResponse($reserve_hierarchy,'Reserve Hierarchy Not Found',404,'Reserve Hierarchy Not Found');
        }
        $result = $reserve_hierarchy->update($data);

        if($result){
            return customApiResponse($result,'SUCCESSFULLY_UPDATED',200);
        }else{
            return customApiResponse($data,'Error updating reserve hierarchy',500);
        }
    }
    public function destroy($id)
    {
        $reserve_hierarchy = ReserveHierarchy::find($id);
        if($reserve_hierarchy==null){
            return customApiResponse($reserve_hierarchy,'Reserve Hierarchy not found',404,'Reserve Hierarchy Not Found');
        }

        if($reserve_hierarchy->delete()){
            return customApiResponse($reserve_hierarchy,'SUCCESSFULLY_DELETED',200);
        }else{
            return customApiResponse($reserve_hierarchy,'Error Deleting Station',500);
        }
    }



}
