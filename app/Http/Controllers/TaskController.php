<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project', 'status')->get();
        $statuses = Status::all();
        return view('tasks.index', compact('tasks', 'statuses'));
    }
    
    public function create()
    {
        $user = auth()->user();
    
        $projects = Project::whereHas('team', function($query) use ($user) {
            $query->whereHas('users', function($query) use ($user) {
                $query->where('users.id', $user->id);
            });
        })->get();
    
        $statuses = Status::all();
    
        return view('tasks.create', compact('projects', 'statuses'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'project_id' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $user = auth()->user();
    
        $projects = Project::whereHas('team', function($query) use ($user) {
            $query->whereHas('users', function($query) use ($user) {
                $query->where('users.id', $user->id);
            });
        })->get();
    
        $statuses = Status::all();
    
        return view('tasks.edit', compact('task', 'projects', 'statuses'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'project_id' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
