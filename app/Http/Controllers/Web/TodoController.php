<?php

namespace App\Http\Controllers\Web;

use App\Domains\Todo\Todo;
use App\Domains\Todo\TodoService;
use App\Dtos\TodoDto;
use App\Http\Requests\StoreTodoRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class TodoController extends Controller
{
    // ** TodoService, TodoRepository 의존성 주입 방식도 동일

    /**
     * 생성자(Constructor) - 클래스를 인스턴스화(객체로 만들기)할 때 호출되는 특별한 메서드로,
     *                      클래스의 이름과 동일한 이름을 가지고 있다.
     * 인스턴스(Instance) - 클래스를 기반으로, 실제로 생성된 객체를 인스턴스라고 한다.
    *                      클래스는 일종의 설계도, 인스턴스는 설계도를 바탕으로 실체화된 실체 객체를 의미한다.
     */

    // 클래스의 속성 선언 - TodoService를 담기 위해
    protected $todoService;

    // 생성자 메서드의 명칭은 __construct로 고정되어 있음 - 생성자 선언시에는 항상 해당 이름으로
    // TodoService 클래스의 객체를 TodoController 클래스의 인스턴스에 주입 - 의존성 주입이라고도 함
    public function __construct(TodoService $todoService)
    {
        // $todoService 인스턴스를 $this->todoService 속성에 할당
        $this->todoService = $todoService;
    }

    /**
     * 리스트 화면
     */
    public function index()
    {
        $userId = Auth::id();
        $todos = $this->todoService->getAllService($userId);
        // compact('todos')는 ['todos' => $todos]와 동일
        return Inertia::render('Todo/TodoList', compact('todos'));
    }

    /**
     * 생성 화면
     */
    public function create()
    {
        return Inertia::render('Todo/TodoCreate');
    }

    /**
     * 생성
     */
    public function store(StoreTodoRequest $request)
    {
        $userId = Auth::id();
        // Entity를 DTO로 변환, laravel-data의 from()을 활용하여 데이터 객체 생성
        $todoDto = TodoDto::from($request->validated(), ['user_id' => $userId]);

        $this->todoService->storeTodoService($todoDto);

        return Redirect::route('todos.index');
    }

    /**
     * 상세 화면
     */
    public function show()
    {
        //
    }

    /**
     * 수정 화면
     */
    public function edit(Todo $todo)
    {
        return Inertia::render('Todo/TodoUpdate', compact('todo'));
    }

    /**
     * 수정
     */
    public function update(StoreTodoRequest $request, int $id)
    {
        $userId = Auth::id();
        $todoDto = TodoDto::from($request->validated(), ['id' => $id, 'user_id' => $userId]);
        $this->todoService->updateTodoService($todoDto);

        // $validatedData = $request->validated();
        // $this->todoService->updateTodoService($validatedData, $id);

        return Redirect::route('todos.index');
    }

    /**
     * 삭제
     */
    public function destroy(int $id)
    {
        $this->todoService->deleteTodoService($id);

        return Redirect::route('todos.index');
    }
}
