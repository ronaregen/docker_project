<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('todo', ['tasks' => Task::latest()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Task::create(['title' => $request->title]);
        return redirect('/');
    }

    public function update(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
