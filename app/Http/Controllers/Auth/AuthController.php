<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{

    /**
     * @param AuthRequest $request
     * @param AuthService $service
     * @return JsonResponse
     */

    protected $AuthService;

    public function __construct(AuthService $AuthService)
    {
        $this->AuthService = $AuthService;
    }

    public function loginUser(AuthRequest $request)
    {
        return $this->AuthService->login($request->all());
    }

    public function registrationUser(RegistrationRequest $request)
    {
        return $this->AuthService->registration($request);
    }

    public function logoutUser()
    {
        return $this->AuthService->logout();
    }

    public function refreshToken()
    {
        return $this->AuthService->refreshToken();
    }
    public function checkUser()
    {
        $user = Auth::user();

        return $user;
    }
}
