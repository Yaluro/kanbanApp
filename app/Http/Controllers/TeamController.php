<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_team' => 'required',
            'nameTeam' => 'required',
            'founded' => 'required',
        ]);
        Team::create([
            'id_team' => $request->id_team,
            'nameTeam' => $request->nameTeam,
            'founded' => $request->founded,
        ]);
        return redirect()->route('teams.index')->with('success', 'équipe crée avec succès');
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
        $hero = Team::findOrFail($id);
        if (Auth::user()->id == $hero->user_id) {


            return view('teams.edit');
        } else {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé modifié cette équipe']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateHero = $request->validate([
            'id_team' => 'required',
            'nameTeam' => 'required',
            'founded' => 'required',

        ]);
        Team::whereId($id)->update($updateHero);
        // ci-dessous erreur ?
        return redirect()->route('teams.index')
            ->with('success', 'ln\'équipe est à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teams = Team::findOrFail($id);
        $teams->delete();
        return redirect('/teams')->with('success', 'équipe supprimé');
    }
}