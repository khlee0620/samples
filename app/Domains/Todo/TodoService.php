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
        return $this->todoRepository->getTodos($userId);
    }

    public function storeTodoService($validatedData)
    {
        return $this->todoRepository->storeTodoRepository($validatedData);
    }

    public function updateTodoService($validatedData, $id)
    {
        return $this->todoRepository->updateTodoRepository($validatedData, $id);
    }

    public function deleteTodoService($id)
    {
        return $this->todoRepository->deleteTodoRepository($id);
    }
}
