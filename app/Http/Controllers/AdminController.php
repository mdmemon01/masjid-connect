<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get counts for statistics cards
        $masjidCount = Masjid::count();
        $imamCount = User::where('role', 'imam')->count();
        
        // Get recent masjids and imams for tables
        $recentMasjids = Masjid::latest()->take(3)->get();
        $recentImams = User::where('role', 'imam')->latest()->take(3)->get();
        
        return view('admin.dashboard', compact(
            'masjidCount', 
            'imamCount', 
            'recentMasjids', 
            'recentImams'
        ));
    }
    
    /**
     * Display a listing of all masjids
     */
    public function masjids()
    {
        $masjids = Masjid::latest()->paginate(10);
        return view('admin.masjids.index', compact('masjids'));
    }

    /**
     * Show the form for creating a new masjid
     */
    public function createMasjid()
    {
        return view('admin.masjids.create');
    }

    /**
     * Store a newly created masjid
     */
    public function storeMasjid(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        Masjid::create($validated);
        
        return redirect()->route('admin.masjids')->with('success', 'Masjid created successfully');
    }

    /**
     * Show a specific masjid
     */
    public function showMasjid(Masjid $masjid)
    {
        // Load the imam relationship
        $masjid->load('imams');
        
        return view('admin.masjids.show', compact('masjid'));
    }

    /**
     * Show the form for editing a masjid
     */
    public function editMasjid(Masjid $masjid)
    {
        return view('admin.masjids.edit', compact('masjid'));
    }

    /**
     * Update a masjid
     */
    public function updateMasjid(Request $request, Masjid $masjid)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $masjid->update($validated);
        
        return redirect()->route('admin.masjids')->with('success', 'Masjid updated successfully');
    }

    /**
     * Delete a masjid
     */
    public function destroyMasjid(Masjid $masjid)
    {
        $masjid->delete();
        
        return redirect()->route('admin.masjids')->with('success', 'Masjid deleted successfully');
    }

    // Assign an Imam to a masjid
    public function assignImam(Request $request, $masjidId)
{
    $request->validate([
        'imam_id' => 'required|exists:users,id',
    ]);
    
    $masjid = Masjid::findOrFail($masjidId);
    $masjid->imams()->attach($request->imam_id);
    
    return redirect()->back()->with('success', 'Imam assigned successfully');
}

// Remove an imam from a masjid 

public function unassignImam($imamId, $masjidId)
{
    $masjid = Masjid::findOrFail($masjidId);
    $masjid->imams()->detach($imamId);
    
    return redirect()->back()->with('success', 'Imam removed successfully');
}
}