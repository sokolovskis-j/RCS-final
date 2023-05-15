<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{   
    public function loginView() : View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function login(LoginRequest $request): JsonResponse|RedirectResponse
    {   
        if (Auth::attempt($request->data())) {
            $request->session()->regenerate();
            return response()->json();
        }
        return back()->withErrors([
            "email" => "The provided credentials are invalid",
        ])->onlyInput("email");
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return response()->json();
    }
}