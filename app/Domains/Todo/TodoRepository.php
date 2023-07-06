<?php

namespace App\Domains\Todo;

use App\Domains\Todo\Todo;

class TodoRepository
{
    public function getUserAll($userId)
    {
        return Todo::where('user_id', $userId)->get();
    }
}
