<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

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
        'recentMasjids',  // Added this line
        'recentImams'
    ));
}
}