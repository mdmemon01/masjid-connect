@extends('imam.layouts.app')

@section('title', 'Prayer Times - ' . $masjid->name)
@section('header', 'Prayer Times Management')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.dashboard') }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
    </a>
</div>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">{{ $masjid->name }} - Prayer Times</h2>
    <a href="{{ route('imam.prayer-times.create', $masjid->id) }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
        <i class="fas fa-plus mr-1"></i> Add Prayer Times
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
    <p>{{ session('success') }}</p>
</div>
@endif

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="p-4 border-b border-gray-200 bg-gray-50">
        <h3 class="text-lg font-medium text-gray-700">Week of {{ $startDate->format('M d, Y') }} - {{ $endDate->format('M d, Y') }}</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fajr</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dhuhr</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asr</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maghrib</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jummah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $currentDate = clone $startDate;
                @endphp
                
                @while($currentDate <= $endDate)
                    @php
                        $dateString = $currentDate->format('Y-m-d');
                        $prayerTime = $prayerTimesByDate[$dateString][0] ?? null;
                        $isToday = $currentDate->isToday();
                    @endphp
                    
                    <tr class="{{ $isToday ? 'bg-green-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $isToday ? 'text-green-800' : 'text-gray-900' }}">
                            {{ $currentDate->format('D, M d') }}
                            @if($isToday)
                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Today</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime ? date('h:i A', strtotime($prayerTime->fajr)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime ? date('h:i A', strtotime($prayerTime->dhuhr)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime ? date('h:i A', strtotime($prayerTime->asr)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime ? date('h:i A', strtotime($prayerTime->maghrib)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime ? date('h:i A', strtotime($prayerTime->isha)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $prayerTime && $prayerTime->jummah ? date('h:i A', strtotime($prayerTime->jummah)) : '—' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            @if($prayerTime)
                                <a href="{{ route('imam.prayer-times.edit', [$masjid->id, $prayerTime->id]) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('imam.prayer-times.destroy', [$masjid->id, $prayerTime->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete these prayer times?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('imam.prayer-times.create', ['masjid' => $masjid->id, 'date' => $dateString]) }}" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-plus"></i> Add
                                </a>
                            @endif
                        </td>
                    </tr>
                    @php
                        $currentDate->addDay();
                    @endphp
                @endwhile
                
                @if(count($prayerTimesByDate) == 0)
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                            No prayer times set for this week. Click "Add Prayer Times" to add new times.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-between items-center mb-4">
    <a href="#" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-1"></i> Previous Week
    </a>
    <a href="#" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        Next Week <i class="fas fa-arrow-right ml-1"></i>
    </a>
</div>
@endsection