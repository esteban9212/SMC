<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Method;
use Illuminate\Support\Facades\Response;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllMethods()
    {
        $methods = Method::all();
        $response = Response::json($methods, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
    }
}