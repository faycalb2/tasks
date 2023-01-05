<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskStoreRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->get();
        
        return Inertia::render('Task/Index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return Inertia::render('Task/Create');
    }

    public function store(TaskStoreRequest $request)
    {
        $validated = $request->validated();

        Task::create([
            'name' => $validated['name'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('tasks.index'))->with('success', 'Task is added successfully.');
    }
}
