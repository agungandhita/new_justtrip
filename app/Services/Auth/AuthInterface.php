<?php

namespace App\Services\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Models\User;

interface AuthInterface
{
    public function login(LoginDTO $dto): bool;

    public function logout(): void;

    public function register(RegisterDTO $dto): User;
}
