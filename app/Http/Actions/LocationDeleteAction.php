<?php

namespace App\Http\Actions;

use App\Models\Location;

class LocationDeleteAction
{
    public function __construct()
    {}
    public function handle(Location $location): ?bool
    {
        return $location->delete();
    }
}
