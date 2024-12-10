<?php

namespace App\Http\Actions;

use App\Models\Location;

class LocationStoreAction
{
    public function __construct()
    {}
    public function handle(array $data): Location
    {
        return Location::create($data);
    }
}
