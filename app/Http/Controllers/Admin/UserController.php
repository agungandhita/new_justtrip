<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HasPaginationResource;
use App\Http\Controllers\Controller;
use App\Services\User\UserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    use HasPaginationResource;
    public function __construct(private UserInterface $userService) {}

    public function index(Request $request): Response
    {
        $users = $this->userService->getAll($request->only(['search', 'role']));

        return Inertia::render('Admin/Users/Index', [
            'users'   => $this->paginateToResource($users),
            'filters' => $request->only(['search', 'role']),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'role'     => ['required', 'in:admin,user'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'    => ['nullable', 'string', 'max:20'],
            'address'  => ['nullable', 'string'],
        ]);

        $this->userService->create($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(string $id): Response
    {
        $user = $this->userService->findById($id);

        return Inertia::render('Admin/Users/Edit', compact('user'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'role'  => ['required', 'in:admin,user'],
        ]);

        $this->userService->update($id, $request->except(['_token', '_method', 'password_confirmation']));

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->userService->delete($id);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }

    public function toggleActive(string $id): RedirectResponse
    {
        $this->userService->toggleActive($id);

        return back()->with('success', 'Status user berhasil diubah.');
    }
}
