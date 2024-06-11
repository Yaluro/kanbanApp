<?php
namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $teams = Team::join('user_team', 'teams.id', '=', 'user_team.team_id')
            ->where('user_team.user_id', $userId)
            ->select('teams.*')
            ->get();

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
        $request->validate([
            'nameTeam' => 'required',
        ]);

        $team = Team::create([
            'nameTeam' => $request->nameTeam,
        ]);

        DB::table('user_team')->insert([
            'user_id' => Auth::user()->id,
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
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nameTeam' => 'required',
        ]);

        $team = Team::findOrFail($id);
        $team->update($request->all());

        return redirect()->route('teams.index')
            ->with('success', 'Équipe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Équipe supprimée avec succès');
    }
}