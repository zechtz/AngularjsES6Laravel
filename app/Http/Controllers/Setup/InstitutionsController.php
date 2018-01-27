<?php

namespace App\Http\Controllers\Setup;
use App\Models\Setup\Institution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstitutionsController extends Controller
{
    public function index (){
        $institution = Institution::all();
        return customApiResponse($institution, 'Success');
    }
}
