<?php

namespace App\Domains\Todo;

use App\Domains\Todo\Todo;

class TodoRepository
{
    // 접속 유저 todo 목록 보기
    public function getAll($userId)
    {
        return Todo::where('user_id', $userId)->get();
    }

    // todo 작성
    public function post($validatedData)
    {
        return Todo::create($validatedData);
    }

    // todo 수정
    public function update($request, $id)
    {
        $todo = Todo::find($id);

        return $todo->update($request->validated());
    }

    // todo 삭제
    public function delete($id)
    {
        $todo = Todo::find($id);

        return $todo->delete();
    }
}
