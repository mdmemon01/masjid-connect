@extends('imam.layouts.app')

@section('title', 'Edit Prayer Times')
@section('header', 'Edit Prayer Times')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.prayer-times', $masjid->id) }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Prayer Times
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Edit Prayer Times for {{ $masjid->name }}</h2>
    
    <form action="{{ route('imam.prayer-times.update', [$masjid->id, $prayerTime->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <div class="text-gray-900 font-medium">{{ $prayerTime->date->format('l, F d, Y') }}</div>
            <p class="mt-1 text-xs text-gray-500">Date cannot be changed. You can create new prayer times for a different date.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div>
                <label for="fajr" class="block text-sm font-medium text-gray-700 mb-1">Fajr <span class="text-red-500">*</span></label>
                <input type="time" id="fajr" name="fajr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('fajr', date('H:i', strtotime($prayerTime->fajr))) }}" required>
                @error('fajr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="dhuhr" class="block text-sm font-medium text-gray-700 mb-1">Dhuhr <span class="text-red-500">*</span></label>
                <input type="time" id="dhuhr" name="dhuhr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('dhuhr', date('H:i', strtotime($prayerTime->dhuhr))) }}" required>
                @error('dhuhr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="asr" class="block text-sm font-medium text-gray-700 mb-1">Asr <span class="text-red-500">*</span></label>
                <input type="time" id="asr" name="asr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('asr', date('H:i', strtotime($prayerTime->asr))) }}" required>
                @error('asr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="maghrib" class="block text-sm font-medium text-gray-700 mb-1">Maghrib <span class="text-red-500">*</span></label>
                <input type="time" id="maghrib" name="maghrib" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('maghrib', date('H:i', strtotime($prayerTime->maghrib))) }}" required>
                @error('maghrib')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="isha" class="block text-sm font-medium text-gray-700 mb-1">Isha <span class="text-red-500">*</span></label>
                <input type="time" id="isha" name="isha" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('isha', date('H:i', strtotime($prayerTime->isha))) }}" required>
                @error('isha')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="{{ $prayerTime->date->format('l') !== 'Friday' ? 'opacity-50' : '' }}">
                <label for="jummah" class="block text-sm font-medium text-gray-700 mb-1">Jummah <span class="text-gray-400">(Friday only)</span></label>
                <input type="time" id="jummah" name="jummah" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('jummah', $prayerTime->jummah ? date('H:i', strtotime($prayerTime->jummah)) : '') }}"
                    {{ $prayerTime->date->format('l') !== 'Friday' ? 'disabled' : '' }}>
                @error('jummah')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('imam.prayer-times', $masjid->id) }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Update Prayer Times
            </button>
        </div>
    </form>
</div>
@endsection