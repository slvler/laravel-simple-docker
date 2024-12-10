<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Hagia Sophia-i Kebir Mosque',
            'latitude' => '41.00876918140346',
            'longitude' => '28.980207184064852',
            'color' => 'D6FFDD'
        ]);
        Location::create([
            'name' => 'Dolmabahce Palace',
            'latitude' => '41.039301840901054',
            'longitude' => '29.00068470288672',
            'color' => 'D0C2BF'
        ]);
        Location::create([
            'name' => 'Taksim Square',
            'latitude' => '41.037090308363766',
            'longitude' => '28.985098832854682',
            'color' => '8D6B67'
        ]);
        Location::create([
            'name' => 'Mihrimah Sultan Mosque',
            'latitude' => '41.02692486063242',
            'longitude' => '29.0160565991851',
            'color' => 'DDE2FA'
        ]);
        Location::create([
            'name' => 'Haydarpasa station',
            'latitude' => '40.9970241704242',
            'longitude' => '29.019535906586345',
            'color' => 'DDE2FA'
        ]);
        Location::create([
            'name' => 'Sirkeci Train Station',
            'latitude' => '41.0154413454899',
            'longitude' => '28.97751506401099',
            'color' => 'FAEBD7'
        ]);
    }
}
