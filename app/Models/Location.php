<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'color'
    ];

    protected function coordinate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($this->attributes['latitude'].','.$this->attributes['longitude'])
        );
    }
}
