
@extends('imam.layouts.app')

@section('title', 'Announcements - ' . $masjid->name)
@section('header', 'Announcements Management')

@section('content')
<div class="mb-6">
    <a href="{{ route('imam.dashboard') }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
    </a>
</div>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">{{ $masjid->name }} - Announcements</h2>
    <a href="{{ route('imam.announcements.create', $masjid->id) }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
        <i class="fas fa-plus mr-1"></i> New Announcement
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
    <p>{{ session('success') }}</p>
</div>
@endif

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="p-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
        <h3 class="text-lg font-medium text-gray-700">All Announcements</h3>
        <div class="text-sm text-gray-500">
            {{ $announcements->count() }} of {{ $announcements->total() }} announcements
        </div>
    </div>
    
    @if($announcements->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($announcements as $announcement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @if($announcement->image_path)
                            <div class="flex-shrink-0 h-10 w-10 mr-4">
                                <img src="{{ asset('storage/' . $announcement->image_path) }}" alt="{{ $announcement->title }}" class="h-10 w-10 rounded-full object-cover">
                            </div>
                            @endif
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $announcement->title }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $announcement->category == 'Urgent' ? 'bg-red-100 text-red-800' : 
                          ($announcement->category == 'Event' ? 'bg-blue-100 text-blue-800' : 
                          'bg-green-100 text-green-800') }}">
                            {{ $announcement->category ?? 'General' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $announcement->publish_date->format('M d, Y') }}
                        @if($announcement->expiry_date)
                            <span class="text-xs">- {{ $announcement->expiry_date->format('M d, Y') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($announcement->is_published)
                            @if($announcement->expiry_date && $announcement->expiry_date < now())
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Expired</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                            @endif
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('imam.announcements.show', [$masjid->id, $announcement->id]) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('imam.announcements.edit', [$masjid->id, $announcement->id]) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('imam.announcements.destroy', [$masjid->id, $announcement->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this announcement?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        {{ $announcements->links() }}
    </div>
    @else
    <div class="text-center py-8 text-gray-500">
        <i class="fas fa-bullhorn text-gray-300 text-5xl mb-3"></i>
        <p class="text-lg">No announcements yet.</p>
        <p class="text-sm mt-2">Click the "New Announcement" button to create one.</p>
    </div>
    @endif
</div>
@endsection