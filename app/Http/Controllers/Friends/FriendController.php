<?php

namespace App\Http\Controllers\Friends;

use App\Http\Controllers\Controller;
use App\Services\Friends\FriendsListService;
use App\Services\Friends\FollowFriendService;
use App\Services\Friends\DestroyFriendService;
use Illuminate\Http\Request;


class FriendController extends Controller
{
    public function index(FriendsListService $service)
    {
        return $service->friendsList();
    }

    public function store(Request $request, FollowFriendService $service)
    {
        return $service->follow($request);
    }

    public function destroy($id, DestroyFriendService $service)
    {
        return $service->destroyFriend($id);
    }
}
