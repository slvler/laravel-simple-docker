<?php

namespace App\Http\Service;

use App\Http\Actions\LocationDeleteAction;
use App\Http\Actions\LocationStoreAction;
use App\Http\Actions\LocationUpdateAction;
use App\Models\Location;

class LocationService
{
    public function __construct()
    {}
    public function store(array $data): Location
    {
        return (new LocationStoreAction())->handle($data);
    }
    public function update(array $data): Location
    {
        return (new LocationUpdateAction())->handle($data);
    }
    public function delete(Location $location): bool
    {
        return (new LocationDeleteAction())->handle($location);
    }
}
