<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserInterface
{
    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(string $id): User;

    public function create(array $data): User;

    public function update(string $id, array $data): User;

    public function delete(string $id): void;

    public function toggleActive(string $id): User;
}
