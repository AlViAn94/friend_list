<?php

namespace App\Services\Friends;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FriendsListService
{
    public function friendsList()
    {
        $user = Auth::user();

        $friend = new Friend();

        $friends_id = $friend->where('user_id', $user['id'])->select('friend_user_id')->get()->toArray();
        $array = [];
        $i = 0;
        if($friends_id){
            foreach ($friends_id as $id){
                $user_name = User::findUserName($id['friend_user_id']);
                $array[$i]['id'] = $id['friend_user_id'];
                $array[$i]['name'] = $user_name['name'];
                $i++;
            }
            return $array;
        }else{
            return $array;
        }
    }
}
