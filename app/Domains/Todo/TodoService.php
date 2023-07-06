<?php

namespace App\Domains\Todo;

use App\Domains\Todo\TodoRepository;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getUserAllTodos($userId)
    {
        return $this->todoRepository->getUserAll($userId);
    }
}
