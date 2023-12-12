<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use App\Services\Friends\PossibleFriendsService;
use Illuminate\Support\Facades\Auth;

class PossibleFriendsController extends Controller
{
    public function index(PossibleFriendsService $service)
    {
        $user = Auth::user();

        return $service->getPossibleFriends($user['id']);
    }
}
