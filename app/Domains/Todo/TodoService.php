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

    public function postTodo($request)
    {
        return $this->todoRepository->post($request);
    }

    public function editTodo($id)
    {
        return $this->todoRepository->edit($id);
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
