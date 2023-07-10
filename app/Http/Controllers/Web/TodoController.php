<?php

namespace App\Http\Controllers\Web;

use App\Domains\Todo\Todo;
use App\Http\Requests\StoreTodoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Domains\Todo\TodoService;

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
        // 접속한 유저 id를 가지고 해당하는 todo 목록 가져오기
        $userId = Auth::id();
        $todos = $this->todoService->getAllService($userId);
        return Inertia::render('Todo/TodoList', compact('todos'));
    }

    /**
     * 생성 화면
     */
    public function create()
    {
        // 생성 화면으로 이동
        return Inertia::render('Todo/TodoCreate');
    }

    /**
     * 생성
     */
    public function store(StoreTodoRequest $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validated();
        $validatedData['user_id'] = $userId;

        // 입력한 값을 post로 보내어 todo 추가 후 리스트 화면으로 이동
        $this->todoService->createTodoService($validatedData);

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
        return Inertia::render('Todo/TodoUpdate', ['todo' => $todo]);
    }

    /**
     * 수정
     */
    public function update(StoreTodoRequest $request, int $id)
    {
        // 입력한 값을 patch로 보내어 기존 todo를 변경한 뒤 리스트 화면으로 이동
        $this->todoService->updateTodoService($request, $id);

        return Redirect::route('todos.index');
    }

    /**
     * 삭제
     */
    public function destroy(int $id)
    {
        // 선택한 todo를 제거
        $this->todoService->deleteTodoService($id);

        return Redirect::route('todos.index');
    }
}
