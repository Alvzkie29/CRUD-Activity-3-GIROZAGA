<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = Complaint::query();

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($filter) {
            $query->where('status', $filter);
        }

        // Fetch complaints with pagination
        $complaints = $query->paginate(10);

        // Count complaints by status
        $pendingCount = Complaint::where('status', 'Pending')->count();
        $resolvedCount = Complaint::where('status', 'Resolved')->count();
        $rejectedCount = Complaint::where('status', 'Rejected')->count();

        return view('complaints.index', compact('complaints', 'pendingCount', 'resolvedCount', 'rejectedCount'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $chirp)
    {
        //
    }
}
