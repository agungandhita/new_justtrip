<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService implements UserInterface
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        return User::query()
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('name', $filters['search'])
                    ->orWhereLike('email', $filters['search'])
            )
            ->when(
                isset($filters['role']) && $filters['role'],
                fn ($q) => $q->where('role', $filters['role'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(string $id, array $data): User
    {
        $user = $this->findById($id);
        $user->update($data);

        return $user->fresh();
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function toggleActive(string $id): User
    {
        $user = $this->findById($id);
        $user->update(['is_active' => ! $user->is_active]);

        return $user->fresh();
    }
}
