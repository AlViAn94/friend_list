<?php

namespace App\Services\Friends;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowFriendService
{
    public function follow($request)
    {
        $user_id = $request->user_id;
        $friend_id = User::whereId($user_id)->select('id', 'name')->first();
        $user = Auth::user();

        if($friend_id){
            $friend = new Friend();

            if($friend->where('user_id', $user['id'])->where('friend_user_id', $friend_id['id'])->first()){
                return response()->json(['message' => $friend_id['name'] . ' уже у вас в друзьях.']);
            }

            $friend->user_id = $user['id'];
            $friend->friend_user_id = $friend_id['id'];

            if($friend->save()){
                return response()->json(['message' => 'Ваш новый друг ' . $friend_id['name']]);
                }else{
                    return response()->json(['error' => 'bed request'],404);
            }
        }
        return response()->json(['message' => 'Такой пользователь не найден']);
    }
}
