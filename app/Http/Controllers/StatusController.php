<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:toDo,doing,done',
        ]);

        Status::query()->update(['toDo' => false, 'doing' => false, 'done' => false]);

        Status::where('id', $id)->update([$request->status => true]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
