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
    public function storeTodoRepository($validatedData)
    {
        return Todo::create($validatedData);
    }

    // todo 수정
    public function updateTodoRepository($validatedData, $id)
    {
        $todo = Todo::find($id);

        return $todo->update($validatedData);
    }

    // todo 삭제
    public function deleteTodoRepository($id)
    {
        $todo = Todo::find($id);

        return $todo->delete();
    }
}
