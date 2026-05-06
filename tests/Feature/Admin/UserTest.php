<?php

use App\Enums\UserRole;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create([
        'role' => UserRole::Admin,
    ]);
    $this->actingAs($this->admin);
});

// ── Index ─────────────────────────────────────────────────────────────────────

test('admin can view users index', function () {
    $this->get(route('admin.users.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Users/Index'));
});

test('guest is redirected from users index', function () {
    auth()->logout();
    $this->get(route('admin.users.index'))
        ->assertRedirect(route('login'));
});

// ── Create / Store ─────────────────────────────────────────────────────────────

test('admin can view user create form', function () {
    $this->get(route('admin.users.create'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Users/Create'));
});

test('admin can create a user with valid data', function () {
    $this->post(route('admin.users.store'), [
        'name'                  => 'John Doe',
        'email'                 => 'john@example.com',
        'role'                  => 'user',
        'password'              => 'password123',
        'password_confirmation' => 'password123',
    ])->assertRedirect(route('admin.users.index'));

    $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
});

test('store validates required fields', function () {
    $this->post(route('admin.users.store'), [])
        ->assertSessionHasErrors(['name', 'email', 'role', 'password']);
});

test('store validates duplicate email', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    $this->post(route('admin.users.store'), [
        'name'                  => 'Another',
        'email'                 => 'taken@example.com',
        'role'                  => 'user',
        'password'              => 'password123',
        'password_confirmation' => 'password123',
    ])->assertSessionHasErrors(['email']);
});

test('store validates password min 8 chars', function () {
    $this->post(route('admin.users.store'), [
        'name'                  => 'Test',
        'email'                 => 'test@example.com',
        'role'                  => 'user',
        'password'              => 'short',
        'password_confirmation' => 'short',
    ])->assertSessionHasErrors(['password']);
});

// ── Edit / Update ─────────────────────────────────────────────────────────────

test('admin can view user edit form', function () {
    $user = User::factory()->create();

    $this->get(route('admin.users.edit', $user))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Admin/Users/Edit'));
});

test('admin can update a user', function () {
    $user = User::factory()->create();

    $this->put(route('admin.users.update', $user), [
        'name'  => 'Updated Name',
        'email' => $user->email,
        'role'  => 'user',
    ])->assertRedirect(route('admin.users.index'));

    $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
});

test('update validates required fields', function () {
    $user = User::factory()->create();

    $this->put(route('admin.users.update', $user), [])
        ->assertSessionHasErrors(['name', 'email', 'role']);
});

// ── Destroy ───────────────────────────────────────────────────────────────────

test('admin can delete a user', function () {
    $user = User::factory()->create();

    $this->delete(route('admin.users.destroy', $user))
        ->assertRedirect(route('admin.users.index'));

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});

// ── Toggle Active ─────────────────────────────────────────────────────────────

test('admin can toggle user active status', function () {
    $user = User::factory()->create(['is_active' => true]);

    $this->post(route('admin.users.toggle-active', $user))
        ->assertRedirect();
});
