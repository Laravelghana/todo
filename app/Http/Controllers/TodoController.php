<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todoList = Todo::orderBy('updated_at', 'desc')->paginate(10);
        return view('index')->with(compact('todoList'));
    }

    public function show($id)
    {
        return $this->getTodoItem($id, 'show');
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        return $this->getTodoItem($id, 'edit');
    }

    private function getTodoItem($id, $page)
    {
        try {
            $todoItem = Todo::findOrFail($id);
        } catch (\Exception $e) {
            return abort(404);
        }
        return view($page)->with(compact('todoItem'));
    }

    public function update($id, TodoRequest $request)
    {
        try {
            Todo::where('id', $id)->update($request->validated());
        } catch (\Exception $e) {
            return abort(400, 'Failed to update item');
        }
        return redirect()->route('todo.index', $id);
    }

    public function store(TodoRequest $request)
    {
        try {
            Todo::create($request->validated());
        } catch (\Exception $e) {
            return abort(400, 'Failed to create item');
        }
        return redirect()->route('todo.index');
    }

    public function destroy($id)
    {
        try {
            Todo::where('id', $id)->delete();
        } catch (\Exception $e) {
            return abort(400, 'Failed to delete item');
        }
        return redirect()->route('todo.index');
    }
}
