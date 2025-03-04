<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Pending,Resolved,Rejected',
        ]);

        // Attach the logged-in user's ID
        $validated['user_id'] = Auth::id();

        Complaint::create($validated);

        return redirect()->route('complaints.index')->with('success', 'Complaint submitted successfully.');
    }


    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:Pending,Resolved,Rejected',
        ]);

        $complaint->update($validated);

        // Handle HTMX request
        if ($request->headers->has('HX-Request')) {
            return view('complaints.show', compact('complaint'));
        }

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Request $request, Complaint $complaint)
    {
        $complaint->delete();

        // Handle HTMX request
        if ($request->headers->has('HX-Request')) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('complaints.index')->with('success', 'Complaint deleted successfully.');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);

        if (request()->headers->has('HX-Request')) {
            return view('complaints.show', compact('complaint'))->render();
        }

        return view('complaints.show', compact('complaint'));
    }
}
