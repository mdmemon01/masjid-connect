@extends('imam.layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard Overview')

@section('content')
<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Assigned Masjids</p>
                <h3 class="text-2xl font-bold">{{ $masjidCount }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-mosque text-green-600"></i>
            </div>
        </div>
        <p class="text-gray-500 text-sm mt-4">Masjids you are responsible for</p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Upcoming Events</p>
                <h3 class="text-2xl font-bold">7</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-calendar-alt text-purple-600"></i>
            </div>
        </div>
        <p class="text-purple-500 text-sm mt-4"><span>↑ 3</span> <span class="text-gray-400">from last month</span></p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-yellow-500 text-white text-xs px-2 py-1 rounded-bl">Coming Soon</div>
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Community Features</p>
                <h3 class="text-lg font-medium mt-1">Member Management</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
            </div>
        </div>
        <p class="text-gray-400 text-sm mt-4">Connect with your community members</p>
    </div>
</div>

<!-- Assigned Masjids -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
    <div class="py-3 px-4 md:px-6 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <h3 class="text-lg font-semibold text-gray-800">Your Assigned Masjids</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($assignedMasjids as $masjid)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $masjid->name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $masjid->location }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                        <a href="{{ route('imam.prayer-times', $masjid->id) }}" class="text-green-600 hover:text-green-900 mr-3">
                            <i class="fas fa-clock mr-1"></i> Prayer Times
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500">No masjids assigned yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Prayer Times & Announcements -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Prayer Times -->
   
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Today's Prayer Times</h3>
        <div class="flex space-x-2">
            <select id="masjid-selector" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                @foreach($assignedMasjids as $masjid)
                <option value="{{ $masjid->id }}">{{ $masjid->name }}</option>
                @endforeach
            </select>
            <a id="edit-prayer-times" href="#" class="text-sm text-green-600 hover:text-green-800">Edit</a>
        </div>
    </div>
    
    @foreach($assignedMasjids as $masjid)
    <div id="prayer-times-{{ $masjid->id }}" class="space-y-3 prayer-times-container" style="{{ !$loop->first ? 'display:none;' : '' }}">
        @if(isset($todaysPrayerTimes[$masjid->id]))
            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                <span class="font-medium">Fajr</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->fajr)) }}</span>
            </div>
            <div class="flex justify-between items-center p-2">
                <span class="font-medium">Dhuhr</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->dhuhr)) }}</span>
            </div>
            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                <span class="font-medium">Asr</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->asr)) }}</span>
            </div>
            <div class="flex justify-between items-center p-2">
                <span class="font-medium">Maghrib</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->maghrib)) }}</span>
            </div>
            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                <span class="font-medium">Isha</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->isha)) }}</span>
            </div>
            @if($todaysPrayerTimes[$masjid->id]->jummah)
            <div class="flex justify-between items-center p-2">
                <span class="font-medium">Jummah</span>
                <span>{{ date('h:i A', strtotime($todaysPrayerTimes[$masjid->id]->jummah)) }}</span>
            </div>
            @endif
        @else
            <div class="p-4 text-center text-sm text-gray-500 bg-gray-50 rounded">
                No prayer times set for today.
                <a href="{{ route('imam.prayer-times.create', ['masjid' => $masjid->id, 'date' => date('Y-m-d')]) }}" class="block mt-2 text-green-600 hover:text-green-800 font-medium">
                    <i class="fas fa-plus-circle mr-1"></i> Add Today's Prayer Times
                </a>
            </div>
        @endif
    </div>
    @endforeach
</div>




    <!-- Update the Announcements section -->
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Recent Announcements</h3>
        @if($masjidCount > 0)
            <div class="flex items-center">
                <select id="masjid-selector-announcements" class="mr-2 text-sm border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    <option value="all">All Masjids</option>
                    @foreach($assignedMasjids as $masjid)
                        <option value="{{ $masjid->id }}">{{ $masjid->name }}</option>
                    @endforeach
                </select>
                <a href="{{ route('imam.announcements.create', $assignedMasjids->first()->id ?? 0) }}" class="text-sm text-green-600 hover:text-green-800">
                    <i class="fas fa-plus-circle"></i> Add New
                </a>
            </div>
        @endif
    </div>
    
    <div class="space-y-4">
        @forelse($recentAnnouncements as $announcement)
            <div class="border-b pb-4">
                <div class="flex items-center mb-1">
                    <h4 class="font-medium">{{ $announcement->title }}</h4>
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $announcement->category == 'Urgent' ? 'bg-red-100 text-red-800' : 
                          ($announcement->category == 'Event' ? 'bg-blue-100 text-blue-800' : 
                          'bg-green-100 text-green-800') }}">
                        {{ $announcement->category ?? 'General' }}
                    </span>
                </div>
                <p class="text-sm text-gray-600 my-1">{{ Str::limit($announcement->content, 100) }}</p>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-gray-500">
                        {{ $announcement->created_at->diffForHumans() }} 
                        <span class="text-gray-400">|</span> 
                        {{ $assignedMasjids->firstWhere('id', $announcement->masjid_id)->name }}
                    </span>
                    <div class="flex space-x-2">
                        <a href="{{ route('imam.announcements.edit', [$announcement->masjid_id, $announcement->id]) }}" class="text-blue-500 hover:text-blue-700 text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('imam.announcements.destroy', [$announcement->masjid_id, $announcement->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm" onclick="return confirm('Are you sure you want to delete this announcement?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-6 text-gray-500">
                <i class="fas fa-bullhorn text-gray-300 text-3xl mb-2"></i>
                <p>No announcements yet.</p>
                @if($masjidCount > 0)
                    <a href="{{ route('imam.announcements.create', $assignedMasjids->first()->id) }}" class="mt-2 inline-block text-green-600 hover:text-green-800 font-medium">
                        <i class="fas fa-plus-circle mr-1"></i> Create your first announcement
                    </a>
                @else
                    <p class="mt-1 text-sm">You need to be assigned to a masjid first.</p>
                @endif
            </div>
        @endforelse
    </div>

    @if(count($recentAnnouncements) > 0 && $masjidCount > 0)
        <div class="mt-4 text-right">
            <a href="{{ route('imam.announcements', $assignedMasjids->first()->id) }}" class="text-sm text-green-600 hover:text-green-800">
                View all announcements <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    @endif
</div>
    
</div>

<!-- Coming Soon Features -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Coming Soon: Donations -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold flex items-center">
                <i class="fas fa-hand-holding-heart text-yellow-500 mr-2"></i>
                Donations Management
                <span class="ml-3 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Coming Soon</span>
            </h3>
        </div>
        <p class="text-gray-600 mb-4">Our donation management system will help you track and manage contributions from community members.</p>
        <ul class="text-gray-500 text-sm space-y-2 mb-4">
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Online donation collection
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Donation tracking and reporting
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Automated receipts for donors
            </li>
        </ul>
    </div>
    
    <!-- Coming Soon: Community -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold flex items-center">
                <i class="fas fa-users text-yellow-500 mr-2"></i>
                Community Management
                <span class="ml-3 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Coming Soon</span>
            </h3>
        </div>
        <p class="text-gray-600 mb-4">Engage with your community members and manage congregation activities efficiently.</p>
        <ul class="text-gray-500 text-sm space-y-2 mb-4">
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Member registration and profiles
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Group management for various activities
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Communication tools for community updates
            </li>
        </ul>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selector = document.getElementById('masjid-selector');
        const editLink = document.getElementById('edit-prayer-times');
        
        function updateVisiblePrayerTimes() {
            // Hide all prayer times
            document.querySelectorAll('.prayer-times-container').forEach(el => {
                el.style.display = 'none';
            });
            
            // Show selected masjid's prayer times
            const selectedMasjidId = selector.value;
            document.getElementById('prayer-times-' + selectedMasjidId).style.display = 'block';
            
            // Update edit link
            const masjidId = selector.value;
            const prayerTimesContainer = document.getElementById('prayer-times-' + masjidId);
            
            if (prayerTimesContainer.querySelector('.p-4.text-center')) {
                // No prayer times set
                editLink.href = "{{ url('imam/masjids') }}/" + masjidId + "/prayer-times/create?date={{ date('Y-m-d') }}";
            } else {
                // Prayer times exist
                editLink.href = "{{ url('imam/masjids') }}/" + masjidId + "/prayer-times";
            }
        }
        
        selector.addEventListener('change', updateVisiblePrayerTimes);
        updateVisiblePrayerTimes(); // Run on page load
    });

    
    document.addEventListener('DOMContentLoaded', function() {
        const announcementSelector = document.getElementById('masjid-selector-announcements');
        if (announcementSelector) {
            announcementSelector.addEventListener('change', function() {
                const masjidId = this.value;
                let addNewBtn = document.querySelector('.text-green-600.hover\\:text-green-800');
                
                if (masjidId !== 'all' && addNewBtn) {
                    // Update the "Add New" button URL
                    addNewBtn.href = "{{ url('imam/masjids') }}/" + masjidId + "/announcements/create";
                }
                
                // For a more advanced implementation, you could use AJAX to fetch 
                // announcements for the selected masjid or implement client-side filtering
            });
        }
    });
</script>
@endsection