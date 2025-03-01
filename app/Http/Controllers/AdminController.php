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
/**
 * Display a listing of all imams
 */
public function imams()
{
    $imams = User::where('role', 'imam')->latest()->paginate(10);
    return view('admin.imams.index', compact('imams'));
}

/**
 * Show the form for creating a new imam
 */
public function createImam()
{
    return view('admin.imams.create');
}

/**
 * Store a newly created imam
 */
public function storeImam(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);
    
    // Create the imam user
    $imam = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => 'imam'
    ]);
    
    return redirect()->route('admin.imams')->with('success', 'Imam created successfully');
}

/**
 * Show a specific imam
 */
public function showImam(User $imam)
{
    // Ensure the user has imam role
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    // Load the masjids relationship
    $imam->load('masjids');
    
    // Get unassigned masjids (for the assignment dropdown)
    $availableMasjids = Masjid::whereDoesntHave('imams', function($query) use ($imam) {
        $query->where('users.id', $imam->id);
    })->get();
    
    return view('admin.imams.show', compact('imam', 'availableMasjids'));
}

/**
 * Assign a masjid to an imam
 */
public function assignImamToMasjid(Request $request, $imamId)
{
    $request->validate([
        'masjid_id' => 'required|exists:masjids,id',
    ]);
    
    $imam = User::findOrFail($imamId);
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    $imam->masjids()->attach($request->masjid_id);
    
    return redirect()->back()->with('success', 'Masjid assigned successfully');
}

/**
 * Remove a masjid from an imam
 */
public function unassignImamFromMasjid($imamId, $masjidId)
{
    $imam = User::findOrFail($imamId);
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    $imam->masjids()->detach($masjidId);
    
    return redirect()->back()->with('success', 'Masjid unassigned successfully');
}

/**
 * Show the form for editing an imam
 */
public function editImam(User $imam)
{
    // Ensure the user has imam role
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    return view('admin.imams.edit', compact('imam'));
}

/**
 * Update an imam
 */
public function updateImam(Request $request, User $imam)
{
    // Ensure the user has imam role
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$imam->id,
        'password' => 'nullable|min:8|confirmed',
    ]);
    
    $data = [
        'name' => $validated['name'],
        'email' => $validated['email'],
    ];
    
    // Only update password if provided
    if (!empty($validated['password'])) {
        $data['password'] = bcrypt($validated['password']);
    }
    
    $imam->update($data);
    
    return redirect()->route('admin.imams')->with('success', 'Imam updated successfully');
}

/**
 * Delete an imam
 */
public function destroyImam(User $imam)
{
    // Ensure the user has imam role
    if ($imam->role !== 'imam') {
        abort(404);
    }
    
    $imam->delete();
    
    return redirect()->route('admin.imams')->with('success', 'Imam deleted successfully');
}
}