<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoutingResource;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutingController extends Controller
{
    public function __construct()
    {}
    public function index($latitude, $longitude)
    {
        $locations = DB::table('locations')
            ->select(
                'id',
                'name',
                'latitude',
                'longitude',
                DB::raw("(6371 * ACOS(COS(RADIANS($latitude)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS($longitude)) + SIN(RADIANS($latitude)) * SIN(RADIANS(latitude)))) AS distance"))
            ->orderBy('distance', 'asc')
            ->get();

       return RoutingResource::collection($locations);
    }
}
