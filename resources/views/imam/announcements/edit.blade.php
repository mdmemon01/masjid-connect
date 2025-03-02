
@extends('imam.layouts.app')

@section('title', 'Edit Announcement')
@section('header', 'Edit Announcement')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.announcements', $masjid->id) }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Announcements
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Edit Announcement for {{ $masjid->name }}</h2>
    
    <form action="{{ route('imam.announcements.update', [$masjid->id, $announcement->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
            <input type="text" id="title" name="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                value="{{ old('title', $announcement->title) }}" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select id="category" name="category" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ old('category', $announcement->category) == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content <span class="text-red-500">*</span></label>
            <textarea id="content" name="content" rows="5" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                required>{{ old('content', $announcement->content) }}</textarea>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            
            @if($announcement->image_path)
            <div class="mb-3">
                <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                <div class="w-full max-w-md h-auto rounded border border-gray-200">
                    <img src="{{ asset('storage/' . $announcement->image_path) }}" alt="{{ $announcement->title }}" class="max-w-full h-auto rounded">
                </div>
            </div>
            @endif
            
            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            <p class="mt-1 text-xs text-gray-500">Upload a new image to replace the current one. Recommended size: 800x400 pixels (Max 2MB)</p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="publish_date" class="block text-sm font-medium text-gray-700 mb-1">Publish Date <span class="text-red-500">*</span></label>
                <input type="date" id="publish_date" name="publish_date" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('publish_date', $announcement->publish_date->format('Y-m-d')) }}" required>
                @error('publish_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                <input type="date" id="expiry_date" name="expiry_date" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                    value="{{ old('expiry_date', $announcement->expiry_date ? $announcement->expiry_date->format('Y-m-d') : '') }}">
                <p class="mt-1 text-xs text-gray-500">Optional. Leave blank if no expiry.</p>
                @error('expiry_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_published" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" {{ old('is_published', $announcement->is_published) ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-600">Published</span>
            </label>
        </div>
        
        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('imam.announcements', $masjid->id) }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Update Announcement
            </button>
        </div>
    </form>
</div>
@endsection