<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PrayerTime;

class ImamController extends Controller
{
    /**
     * Display the imam dashboard
     */
    

/**
 * Display the prayer times for a masjid
 */
public function prayerTimes($masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    // Get current week's prayer times
    $startDate = now()->startOfWeek();
    $endDate = now()->endOfWeek();
    
    $prayerTimes = $masjid->prayerTimes()
        ->whereBetween('date', [$startDate, $endDate])
        ->orderBy('date')
        ->get();
    
    // Group by date
    $prayerTimesByDate = $prayerTimes->groupBy(function($item) {
        return $item->date->format('Y-m-d');
    });
    
    return view('imam.prayer-times.index', compact('masjid', 'prayerTimesByDate', 'startDate', 'endDate'));
}

/**
 * Show form to create prayer times
 */
public function createPrayerTime($masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    return view('imam.prayer-times.create', compact('masjid'));
}

/**
 * Store a new prayer time
 */
public function storePrayerTime(Request $request, $masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $validated = $request->validate([
        'date' => 'required|date',
        'fajr' => 'required|date_format:H:i',
        'dhuhr' => 'required|date_format:H:i',
        'asr' => 'required|date_format:H:i',
        'maghrib' => 'required|date_format:H:i',
        'isha' => 'required|date_format:H:i',
        'jummah' => 'nullable|date_format:H:i',
    ]);
    
    // Check if prayer times for this date already exist
    $existingRecord = $masjid->prayerTimes()
        ->where('date', $validated['date'])
        ->first();
        
    if ($existingRecord) {
        // Update existing record
        $existingRecord->update($validated);
        $message = 'Prayer times updated successfully';
    } else {
        // Create new record
        $masjid->prayerTimes()->create($validated);
        $message = 'Prayer times added successfully';
    }
    
    return redirect()
        ->route('imam.prayer-times', $masjid->id)
        ->with('success', $message);
}

/**
 * Show form to edit prayer times
 */
public function editPrayerTime($masjidId, $prayerTimeId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $prayerTime = $masjid->prayerTimes()->findOrFail($prayerTimeId);
    
    return view('imam.prayer-times.edit', compact('masjid', 'prayerTime'));
}

/**
 * Update prayer times
 */
public function updatePrayerTime(Request $request, $masjidId, $prayerTimeId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $prayerTime = $masjid->prayerTimes()->findOrFail($prayerTimeId);
    
    $validated = $request->validate([
        'fajr' => 'required|date_format:H:i',
        'dhuhr' => 'required|date_format:H:i',
        'asr' => 'required|date_format:H:i',
        'maghrib' => 'required|date_format:H:i',
        'isha' => 'required|date_format:H:i',
        'jummah' => 'nullable|date_format:H:i',
    ]);
    
    $prayerTime->update($validated);
    
    return redirect()
        ->route('imam.prayer-times', $masjid->id)
        ->with('success', 'Prayer times updated successfully');
}

/**
 * Delete prayer times
 */
public function destroyPrayerTime($masjidId, $prayerTimeId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $prayerTime = $masjid->prayerTimes()->findOrFail($prayerTimeId);
    $prayerTime->delete();
    
    return redirect()
        ->route('imam.prayer-times', $masjid->id)
        ->with('success', 'Prayer times deleted successfully');
}
    /**
 * Display the imam dashboard
 */
public function dashboard()
{
    // Get the authenticated imam
    $imam = Auth::user();
    
    // Load assigned masjids
    $assignedMasjids = $imam->masjids()->get();
    
    // Get count of assigned masjids
    $masjidCount = $assignedMasjids->count();
    
    // Get today's prayer times for all masjids
    $todaysPrayerTimes = [];
    foreach ($assignedMasjids as $masjid) {
        $prayerTime = $masjid->prayerTimes()
            ->where('date', now()->format('Y-m-d'))
            ->first();
            
        if ($prayerTime) {
            $todaysPrayerTimes[$masjid->id] = $prayerTime;
        }
    }
    
    // Pass data to the view
    return view('imam.dashboard', compact(
        'imam',
        'assignedMasjids',
        'masjidCount',
        'todaysPrayerTimes'
    ));
}
}