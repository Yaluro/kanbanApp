<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.x
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status_id' => 'required',
        ]);

        Task::create([
            'nameTask' => $request->nameTask,
            'description' => $request->description,
            'status_id' => $request->status_id,
        ]);


        return redirect()->route('tasks.index')->with('success', 'tâche créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        if (Auth::user()->id == $task->user_id) { // Assuming heroes are associated with users

            return view('task.edit', compact('task'));
        } else {
            return redirect()->route('task')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à modifier cette tâche']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $taskEdit = $request->validate([
            'nameTask' => 'required',
            'description' => 'required',
            'status_id' => 'required',
        ]);
        Task::whereId($id)->update($taskEdit);
        // ci-dessous erreur ?
        return redirect()->route('task.index')
            ->with('success', 'Tâche mise à jour'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/task')->with('success', 'Tâche supprimé avec succès');
    }
}
