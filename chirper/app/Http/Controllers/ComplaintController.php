<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())->get();
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return redirect()->route('complaints.index')->with('success', 'Complaint submitted successfully.');
    }

    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:Pending,Resolved,Rejected',
        ]);

        $complaint->update(['status' => $request->status]);

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Complaint deleted successfully.');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.show', compact('complaint'));
    }
}
