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

    public function getAllTodos($userId)
    {
        return $this->todoRepository->getAll($userId);
    }

    public function postTodo($validatedData)
    {
        return $this->todoRepository->post($validatedData);
    }

    public function updateTodo($request, $id)
    {
        return $this->todoRepository->update($request, $id);
    }

    public function deleteTodo($id)
    {
        return $this->todoRepository->delete($id);
    }
}
