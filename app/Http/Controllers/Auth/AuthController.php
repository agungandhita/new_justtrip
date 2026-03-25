<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function __construct(private AuthInterface $authService) {}

    public function showLogin(): Response
    {
        return Inertia::render('auth/Login', [
            'canResetPassword' => true,
            'canRegister'      => true,
        ]);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $dto = new LoginDTO(
            email: $request->email,
            password: $request->password,
            remember: (bool) $request->remember,
        );

        if (! $this->authService->login($dto)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === UserRole::Admin) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/');
    }

    public function showRegister(): Response
    {
        dd('test hit'); return Inertia::render('auth/Register', [
            'canLogin' => true,
        ]);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $dto = new RegisterDTO(
            name: $request->name,
            email: $request->email,
            phone: $request->phone,
            address: $request->address,
            password: $request->password,
        );

        $user = $this->authService->register($dto);
        Auth::login($user);

        return redirect('/');
    }

    public function logout(): RedirectResponse
    {
        $this->authService->logout();

        return redirect('/login');
    }
}
