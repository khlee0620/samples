<?php

namespace App\Domains\Todo;

use App\Domains\Todo\Todo;

class TodoRepository
{
    // 접속 유저 todo 목록 보기
    public function getTodos($userId)
    {
        return Todo::where('user_id', $userId)->get();
    }

    // todo 작성
    public function createTodo($validatedData)
    {
        return Todo::create($validatedData);
    }

    // todo 수정
    public function updateTodo($validatedData, $id)
    {
        $todo = Todo::find($id);

        return $todo->update($validatedData);
    }

    // todo 삭제
    public function deleteTodo($id)
    {
        $todo = Todo::find($id);

        return $todo->delete();
    }
}
