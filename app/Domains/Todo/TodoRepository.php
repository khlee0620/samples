<?php

namespace App\Domains\Todo;

use Illuminate\Support\Facades\Auth;
use App\Domains\Todo\Todo;
use Illuminate\Support\Facades\Log;

class TodoRepository
{
    // 접속 유저 todo 목록 보기
    public function getAll($userId)
    {
        return Todo::where('user_id', $userId)->get();
    }

    // todo 작성
    public function post($request)
    {
        $userId = Auth::id();
        $validatedData = $request->validated();
        $validatedData['user_id'] = $userId;

        return Todo::create($validatedData);
    }

    // todo 수정 화면
    public function edit($id)
    {
        return $todo = Todo::find($id);
    }

    // todo 수정
    public function update($request, $id)
    {
        $validatedData = $request->validated();
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;

        return $todo->save();
    }

    // todo 삭제
    public function delete($id)
    {
        $todo = Todo::find($id);

        return $todo->delete();
    }
}
