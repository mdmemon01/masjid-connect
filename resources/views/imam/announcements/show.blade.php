
@extends('imam.layouts.app')

@section('title', $announcement->title)
@section('header', 'View Announcement')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.announcements', $masjid->id) }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Announcements
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-900">{{ $announcement->title }}</h1>
            
            <div class="flex space-x-2">
                <a href="{{ route('imam.announcements.edit', [$masjid->id, $announcement->id]) }}" class="text-indigo-600 hover:text-indigo-900">
                    <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <form action="{{ route('imam.announcements.destroy', [$masjid->id, $announcement->id]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this announcement?')">
                        <i class="fas fa-trash mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        
        <div class="flex items-center text-sm text-gray-500 space-x-4 mb-4">
            <span class="flex items-center">
                <i class="far fa-calendar mr-1"></i> 
                {{ $announcement->publish_date->format('M d, Y') }}
                @if($announcement->expiry_date)
                    - {{ $announcement->expiry_date->format('M d, Y') }}
                @endif
            </span>
            
            @if($announcement->category)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                {{ $announcement->category == 'Urgent' ? 'bg-red-100 text-red-800' : 
                ($announcement->category == 'Event' ? 'bg-blue-100 text-blue-800' : 
                'bg-green-100 text-green-800') }}">
                {{ $announcement->category }}
            </span>
            @endif
            
            <span class="flex items-center">
                @if($announcement->is_published)
                    @if($announcement->expiry_date && $announcement->expiry_date < now())
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Expired</span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                    @endif
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                @endif
            </span>
        </div>
        
        @if($announcement->image_path)
        <div class="my-6">
            <img src="{{ asset('storage/' . $announcement->image_path) }}" alt="{{ $announcement->title }}" class="max-w-full h-auto rounded-lg shadow">
        </div>
        @endif
        
        <div class="prose max-w-none">
            {{ $announcement->content }}
        </div>
    </div>
</div>

<div class="flex items-center justify-between">
    <div>
        <span class="text-sm text-gray-500">
            <i class="far fa-clock mr-1"></i> Created: {{ $announcement->created_at->format('M d, Y H:i') }}
        </span>
        @if($announcement->updated_at && $announcement->updated_at->ne($announcement->created_at))
        <span class="text-sm text-gray-500 ml-4">
            <i class="fas fa-pencil-alt mr-1"></i> Updated: {{ $announcement->updated_at->format('M d, Y H:i') }}
        </span>
        @endif
    </div>
</div>
@endsection