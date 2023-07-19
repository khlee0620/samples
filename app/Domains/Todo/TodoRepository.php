<?php

namespace App\Domains\Todo;

use App\Domains\Todo\Todo;
use Illuminate\Support\Facades\Log;

class TodoRepository
{
    // 접속 유저 todo 목록 보기
    public function getTodosRepository($userId)
    {
        return Todo::where('user_id', $userId)->get();
    }

    // todo 작성
    public function storeTodoRepository($todoDto): Todo
    {
        // DTO를 Entity로 변환
        // create는 id값이 없기에 'id'를 제외하고 나머지 데이터만 담기 위해
        // Todo Entity를 생성한 뒤 각 값들을 해당 속성에 할당 후, save()로 Entity 저장
        $todo = new Todo();
        $todo->title = $todoDto->title;
        $todo->description = $todoDto->description;
        $todo->user_id = $todoDto->user_id;

        $todo->save();

        return $todo;

        // 결과는 똑같은데 아래의 경우는 $todo에 Dto를 배열로 만들어서 넣은뒤에 Todo Entity를 생성하고 서장하는 형태
        // $todo = $todoDto->except('id')->all();
        // return Todo::create($todo);
    }

    // todo 수정
    public function updateTodoRepository($todoDto): Todo
    {
        $todo = Todo::find($todoDto->id);
        $todo->title = $todoDto->title;
        $todo->description = $todoDto->description;

        $todo->save();

        return $todo;
    }

    // todo 삭제
    public function deleteTodoRepository($id)
    {
        $todo = Todo::find($id);

        return $todo->delete();
    }
}
