<?php

namespace App\Http\Actions;

use App\Models\Location;

class LocationUpdateAction
{
    public function __construct()
    {}
    public function handle(array $data): Location
    {
        $location = Location::whereId($data['id'])->first();
        $location->update($data);
        return $location->refresh();
    }
}
