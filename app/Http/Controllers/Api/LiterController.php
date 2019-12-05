<?php

namespace App\Http\Controllers\Api;

use App\Models\Liter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LiterService;

class LiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LiterService $service)
    {
        return response()->json($service->getAll(), 200); 
    }

}
