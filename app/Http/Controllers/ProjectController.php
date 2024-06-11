<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('projects.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameProject' => 'required',
            'team_id' => 'required',
        ]);

        Project::create([
            'nameProject' => $request->nameProject,
            'team_id' => $request->team_id,
        ]);

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrfail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->id == $project->id) {
            return view('projects.edit', compact('project'));
        } else {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à modifier ce projet']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateProject = $request->validate([
            'nameProject' => 'required',
            'id_team' => 'required',
        ]);
        Project::whereId($id)->update($updateProject);
        return redirect()->route('projects.index')
            ->with('success', 'Le projet a ete mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/projects')->with('success', 'Projet supprimé avec succès');
    }
}
