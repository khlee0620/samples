<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use App\Domains\Todo\TodoService;
use App\Models\User;

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
        $todos = $this->todoService->getUserAllTodos($userId);
        $user = User::where('id', '=', 1)->with('todos')->get();
        Log::debug($user->toArray());
        return Inertia::render('Todo/TodoList', compact('todos'));
    }

    /**
     * 생성 화면
     */
    public function create()
    {
        //
    }

    /**
     * 생성
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 상세 화면
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 수정 화면
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * 수정
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * 삭제
     */
    public function destroy(string $id)
    {
        //
    }
}
