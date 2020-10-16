<?php

namespace App\Http\Controllers;

use App\Models\Bear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic:,name');
        $this->middleware('throttle');
    }

    /**
     * Display a listing of the resource.
     *
     * @param $laditude
     * @param $longitude
     * @return \Illuminate\Http\Response
     */
    public function index($laditude, $longitude)
    {
        $bears = Bear::findByCoordinates($laditude, $longitude);

        // Log the request.
        Log::info('Bear hunt requested by: ' . $_SERVER['REMOTE_ADDR'] . ' Bears found: ' . count($bears));

        return $bears;
    }
}
