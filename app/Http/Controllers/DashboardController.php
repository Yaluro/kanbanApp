<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Team;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::id();
        $projects = Project::whereHas('team.users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->with('team')->get();

        $teams = Team::whereHas('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->get();

        return view('dashboard.dashboard', compact('projects', 'teams'));
    }
}
