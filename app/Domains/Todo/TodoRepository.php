<?php

namespace App\Domains\Todo;

use App\Domains\Todo\Todo;

class TodoRepository
{
    public function getAll()
    {
        return Todo::all();
    }
}
