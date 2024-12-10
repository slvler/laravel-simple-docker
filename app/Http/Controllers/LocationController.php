<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationStoreRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\LocationShowResource;
use App\Http\Service\LocationService;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private LocationService $locationService;
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $location = Location::all();
        return LocationResource::collection($location);
    }
    public function store(LocationStoreRequest $request)
    {
        $validate = $request->validated();
        $location = $this->locationService->store($validate);
        return new LocationShowResource($location);
    }
    public function show($id)
    {
        try {
            $location = Location::findOrFail($id);
            return new LocationShowResource($location);
        }catch (\Throwable $throwable){
            return response()->json([
                'success' => false,
                'message' => $throwable->getMessage(),
            ]);
        }
    }
    public function update(LocationUpdateRequest $request)
    {
        $validate = $request->validated();

        $location = $this->locationService->update($validate);
        return new LocationShowResource($location);
    }

    public function delete(Location $location)
    {
        try {
            $location->delete();
            return response()->json([
                'success' => true,
                'message' => "successful",
            ]);
        }catch (\Throwable $throwable){
            return response()->json([
                'success' => false,
                'message' => $throwable->getMessage(),
            ]);
        }
    }
}
