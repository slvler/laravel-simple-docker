<?php

namespace App\Http\Service;

use App\Http\Actions\LocationStoreAction;
use App\Http\Actions\LocationUpdateAction;

class LocationService
{
    public function __construct()
    {}
    public function store(array $data)
    {
        return (new LocationStoreAction())->handle($data);
    }

    public function update(array $data)
    {
        return (new LocationUpdateAction())->handle($data);
    }
}
