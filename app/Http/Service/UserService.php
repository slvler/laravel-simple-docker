<?php

namespace App\Http\Service;

use App\Http\Actions\RegisterStoreAction;
use App\Models\User;

class UserService
{
    public function __construct()
    {}

    public function store(array $data): User
    {
        return (new RegisterStoreAction())->handle($data);
    }
}
