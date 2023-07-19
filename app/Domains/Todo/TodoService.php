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

    public function getAllService($userId)
    {
        // 디테일한 유효성 검사
        return $this->todoRepository->getTodosRepository($userId);
    }

    public function storeTodoService($todoDto)
    {
        return $this->todoRepository->storeTodoRepository($todoDto);
    }

    public function updateTodoService($todoDto)
    {
        return $this->todoRepository->updateTodoRepository($todoDto);
    }

    public function deleteTodoService($id)
    {
        return $this->todoRepository->deleteTodoRepository($id);
    }
}
