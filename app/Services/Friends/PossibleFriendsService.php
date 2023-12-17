<?php

namespace App\Services\Friends;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PossibleFriendsService
{
    public function getPossibleFriends($user_id, $depth = 1, $maxDepth = 5, $visited = [])
    {
        // Генерация уникального ключа для кэширования
        $cacheKey = "possible_friends_{$user_id}_{$depth}_{$maxDepth}";

        // Попытка получения данных из кэша
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $user = Auth::user();

        $userModel = User::with('friends')->find($user_id);

        $friends = $userModel->friends;

        $possibleFriends = collect();

        //Вызываем рекурсивную функцию для получения возможных друзей
        foreach ($friends as $friend) {
            if (!in_array($friend->id, $visited) && $friend->id !== $user->id && !$possibleFriends->contains('id', $friend->id)) {
                $possibleFriends->push($friend);

                if ($depth < $maxDepth) {
                    $visited[] = $friend->id;
                    $possibleFriends = $possibleFriends->merge(
                        $this->getPossibleFriends($friend->id, $depth + 1, $maxDepth, $visited)
                    );
                }
            }
        }

        // Удалить дубликаты по полю 'id'
        $uniqueIdResult = $possibleFriends->unique('id');

        // Сохранение данных в кэше
        Cache::put($cacheKey, $uniqueIdResult, now()->addDay());

        return $uniqueIdResult;
    }
}
