<?php

namespace App\DTOs\Auth;

readonly class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $address,
        public string $password,
    ) {}
}
