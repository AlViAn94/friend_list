<?php

namespace App\Services\Friends;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PossibleFriendsService
{
    public function getPossibleFriends($user_id, $depth = 1,$maxDepth = 5,$visited = [])
    {
        $friends = User::find($user_id)->friends;

        $possibleFriends = collect();

        $user = Auth::user();

        foreach ($friends as $friend) {

            if (!in_array($friend->id, $visited)) {
                if ($friend->id != $user['id']) {
                    $possibleFriends->push($friend);
                }
                if ($depth < $maxDepth) {
                    $visited[] = $friend->id;
                    $possibleFriends = $possibleFriends->merge($this->getPossibleFriends($friend->id, $depth + 1, $maxDepth, $visited));
                }
            }
        }
        return $possibleFriends;
    }
}
