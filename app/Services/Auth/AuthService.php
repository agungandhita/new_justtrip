<?php

namespace App\Services\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthInterface
{
    public function login(LoginDTO $dto): bool
    {
        return Auth::attempt(
            ['email' => $dto->email, 'password' => $dto->password],
            $dto->remember
        );
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function register(RegisterDTO $dto): User
    {
        return User::create([
            'name'     => $dto->name,
            'email'    => $dto->email,
            'phone'    => $dto->phone,
            'address'  => $dto->address,
            'password' => $dto->password,
            'role'     => UserRole::User,
        ]);
    }
}
