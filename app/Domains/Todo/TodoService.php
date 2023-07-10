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

    public function createTodoService($validatedData)
    {
        return $this->todoRepository->createTodo($validatedData);
    }

    public function updateTodoService($request, $id)
    {
        return $this->todoRepository->updateTodo($request, $id);
    }

    public function deleteTodoService($id)
    {
        return $this->todoRepository->deleteTodo($id);
    }
}
