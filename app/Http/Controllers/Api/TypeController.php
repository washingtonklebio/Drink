<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TypeService;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TypeService $service)
    {
        return response()->json($service->getAll(), 200); 
    }

}
