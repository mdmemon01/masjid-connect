@extends('imam.layouts.app')

@section('title', 'Add Prayer Times')
@section('header', 'Add New Prayer Times')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.prayer-times', $masjid->id) }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Prayer Times
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Add Prayer Times for {{ $masjid->name }}</h2>
    
    <form action="{{ route('imam.prayer-times.store', $masjid->id) }}" method="POST">
        @csrf
        
        <div class="mb-6">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date <span class="text-red-500">*</span></label>
            <input type="date" id="date" name="date" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                value="{{ request('date', date('Y-m-d')) }}" required>
            @error('date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div>
                <label for="fajr" class="block text-sm font-medium text-gray-700 mb-1">Fajr <span class="text-red-500">*</span></label>
                <input type="time" id="fajr" name="fajr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('fajr', '05:00') }}" required>
                @error('fajr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="dhuhr" class="block text-sm font-medium text-gray-700 mb-1">Dhuhr <span class="text-red-500">*</span></label>
                <input type="time" id="dhuhr" name="dhuhr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('dhuhr', '13:00') }}" required>
                @error('dhuhr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="asr" class="block text-sm font-medium text-gray-700 mb-1">Asr <span class="text-red-500">*</span></label>
                <input type="time" id="asr" name="asr" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('asr', '16:00') }}" required>
                @error('asr')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="maghrib" class="block text-sm font-medium text-gray-700 mb-1">Maghrib <span class="text-red-500">*</span></label>
                <input type="time" id="maghrib" name="maghrib" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('maghrib', '19:00') }}" required>
                @error('maghrib')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="isha" class="block text-sm font-medium text-gray-700 mb-1">Isha <span class="text-red-500">*</span></label>
                <input type="time" id="isha" name="isha" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('isha', '20:30') }}" required>
                @error('isha')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="jummah" class="block text-sm font-medium text-gray-700 mb-1">Jummah <span class="text-gray-400">(Friday only)</span></label>
                <input type="time" id="jummah" name="jummah" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('jummah', '13:30') }}">
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
                Save Prayer Times
            </button>
        </div>
    </form>
</div>

<script>
    // Auto-update date field based on URL parameter
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const dateParam = urlParams.get('date');
        if (dateParam) {
            document.getElementById('date').value = dateParam;
        }
        
        // If the selected date is Friday, show Jummah field
        const dateField = document.getElementById('date');
        const jummahContainer = document.getElementById('jummah').parentNode;
        
        function checkIfFriday() {
            const selectedDate = new Date(dateField.value);
            // 5 = Friday (0 is Sunday, 1 is Monday, etc.)
            if (selectedDate.getDay() === 5) {
                jummahContainer.classList.remove('opacity-50');
                document.getElementById('jummah').removeAttribute('disabled');
            } else {
                jummahContainer.classList.add('opacity-50');
                document.getElementById('jummah').setAttribute('disabled', 'disabled');
            }
        }
        
        // Check initially
        checkIfFriday();
        
        // Check whenever date changes
        dateField.addEventListener('change', checkIfFriday);
    });
</script>
@endsection