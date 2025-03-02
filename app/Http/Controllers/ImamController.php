<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PrayerTime;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class ImamController extends Controller
{

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
    
    // Get recent announcements from all assigned masjids
    $recentAnnouncements = [];
    if ($masjidCount > 0) {
        $masjidIds = $assignedMasjids->pluck('id')->toArray();
        $recentAnnouncements = Announcement::whereIn('masjid_id', $masjidIds)
            ->where('is_published', true)
            ->where(function($query) {
                $query->whereNull('expiry_date')
                    ->orWhere('expiry_date', '>=', now()->format('Y-m-d'));
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }
    
    // Pass data to the view
    return view('imam.dashboard', compact(
        'imam',
        'assignedMasjids',
        'masjidCount',
        'todaysPrayerTimes',
        'recentAnnouncements'
    ));
}

//Display a listing of announcements

public function announcements($masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    // Get announcements for this masjid
    $announcements = $masjid->announcements()
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    
    return view('imam.announcements.index', compact('masjid', 'announcements'));
}

/**
 * Show the form for creating a new announcement
 */
public function createAnnouncement($masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    // Categories for announcements
    $categories = ['General', 'Event', 'Urgent', 'Classes', 'Community'];
    
    return view('imam.announcements.create', compact('masjid', 'categories'));
}

/**
 * Store a newly created announcement
 */
public function storeAnnouncement(Request $request, $masjidId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048', // max 2MB
        'is_published' => 'boolean',
        'publish_date' => 'required|date',
        'expiry_date' => 'nullable|date|after_or_equal:publish_date',
        'category' => 'nullable|string|max:50',
    ]);
    
    $announcement = new Announcement($validated);
    
    // Handle the image upload if present
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('announcements', 'public');
        $announcement->image_path = $path;
    }
    
    $announcement->masjid_id = $masjid->id;
    $announcement->is_published = $request->has('is_published');
    $announcement->save();
    
    return redirect()
        ->route('imam.announcements', $masjid->id)
        ->with('success', 'Announcement created successfully!');
}

/**
 * Show a specific announcement
 */
public function showAnnouncement($masjidId, $announcementId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $announcement = $masjid->announcements()->findOrFail($announcementId);
    
    return view('imam.announcements.show', compact('masjid', 'announcement'));
}

/**
 * Show the form for editing an announcement
 */
public function editAnnouncement($masjidId, $announcementId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $announcement = $masjid->announcements()->findOrFail($announcementId);
    
    // Categories for announcements
    $categories = ['General', 'Event', 'Urgent', 'Classes', 'Community'];
    
    return view('imam.announcements.edit', compact('masjid', 'announcement', 'categories'));
}

/**
 * Update the specified announcement
 */
public function updateAnnouncement(Request $request, $masjidId, $announcementId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $announcement = $masjid->announcements()->findOrFail($announcementId);
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048', // max 2MB
        'is_published' => 'boolean',
        'publish_date' => 'required|date',
        'expiry_date' => 'nullable|date|after_or_equal:publish_date',
        'category' => 'nullable|string|max:50',
    ]);
    
    // Handle the image upload if present
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($announcement->image_path) {
            Storage::disk('public')->delete($announcement->image_path);
        }
        
        $path = $request->file('image')->store('announcements', 'public');
        $validated['image_path'] = $path;
    }
    
    $announcement->fill($validated);
    $announcement->is_published = $request->has('is_published');
    $announcement->save();
    
    return redirect()
        ->route('imam.announcements', $masjid->id)
        ->with('success', 'Announcement updated successfully!');
}

/**
 * Remove the specified announcement
 */
public function destroyAnnouncement($masjidId, $announcementId)
{
    $imam = Auth::user();
    
    // Check if imam is assigned to this masjid
    $masjid = $imam->masjids()->findOrFail($masjidId);
    
    $announcement = $masjid->announcements()->findOrFail($announcementId);
    
    // Delete image if exists
    if ($announcement->image_path) {
        Storage::disk('public')->delete($announcement->image_path);
    }
    
    $announcement->delete();
    
    return redirect()
        ->route('imam.announcements', $masjid->id)
        ->with('success', 'Announcement deleted successfully!');
}


}