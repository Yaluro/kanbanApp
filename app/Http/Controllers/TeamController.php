<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nameTeam' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        // Créer l'équipe
        $team = Team::create([
            'nameTeam' => $request->nameTeam,
        ]);
    
        // Ajouter une entrée dans la table pivot user_team
        DB::table('user_team')->insert([
            'user_id' => $request->user_id,
            'team_id' => $team->id,
        ]);
    
        return redirect()->route('teams.index')->with('success', 'Équipe créée avec succès');
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
    public function edit(Team $teams, $id)
    {
        if (Auth::user()->user_id == $teams->id) {


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
        $updateTeam = $request->validate([
            'id' => 'required',
            'nameTeam' => 'required',

        ]);
        Team::whereId($id)->update($updateTeam);
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