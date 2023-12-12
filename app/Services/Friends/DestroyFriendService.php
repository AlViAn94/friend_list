<?php

namespace App\Services\Friends;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DestroyFriendService
{
    public function destroyFriend($id)
    {
        $user = Auth::user();
        if(!$friend = Friend::where('user_id', $user['id'])->where('friend_user_id', $id)->first()){
            return response()->json(['error' => 'Пользователь не найден.'], 404);
        }

        $friend_name = User::findUserName($friend['friend_user_id']);

        if($friend->delete()){
            return response()->json(['message' => $friend_name['name'] . ' удалён из списка друзей.']);
        }else{
            return response()->json(['error' => 'Не удалось удалить.'], 404);
        }
    }
}

