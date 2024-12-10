<?php

namespace App\Http\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterStoreAction
{
    public function __construct()
    {}
    public function handle(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
