@extends('admin.layouts.app')

@section('title', 'Imam Details')
@section('header', 'Imam Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.imams') }}" class="text-green-600 hover:text-green-800 font-medium flex items-center">
        <i class="fas fa-arrow-left mr-2"></i> Back to Imam List
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">{{ $imam->name }}</h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.imams.edit', $imam) }}" class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700">
                <i class="fas fa-edit mr-1"></i> Edit
            </a>
            <form action="{{ route('admin.imams.destroy', $imam) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 bg-red-600 text-white rounded-md text-sm hover:bg-red-700"
                    onclick="return confirm('Are you sure you want to delete this imam?')">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>
    </div>
    
    <div class="p-6">
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-8">
            <div class="col-span-1">
                <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                <dd class="mt-1 text-lg text-gray-900">{{ $imam->name }}</dd>
            </div>
            
            <div class="col-span-1">
                <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                <dd class="mt-1 text-lg text-gray-900">{{ $imam->email }}</dd>
            </div>
            
            <div class="col-span-1">
                <dt class="text-sm font-medium text-gray-500">Assigned Masjids</dt>
                <dd class="mt-1 text-lg text-gray-900">{{ $imam->masjids->count() }}</dd>
            </div>
            
            <div class="col-span-1">
                <dt class="text-sm font-medium text-gray-500">Account Created</dt>
                <dd class="mt-1 text-gray-900">{{ $imam->created_at->format('F d, Y') }}</dd>
            </div>
        </dl>
    </div>
</div>

<!-- Assigned Masjids -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-medium text-gray-800">Assigned Masjids</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($imam->masjids as $masjid)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $masjid->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $masjid->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form action="{{ route('admin.imams.unassign', [$imam->id, $masjid->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" 
                                onclick="return confirm('Are you sure you want to remove this masjid assignment?')">
                                <i class="fas fa-unlink"></i> Remove Assignment
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">No masjids assigned to this imam</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        <form action="{{ route('admin.imams.assign', $imam->id) }}" method="POST" class="flex items-center">
            @csrf
            <select name="masjid_id" class="rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 mr-3">
                <option value="">Select a masjid to assign</option>
                @foreach($availableMasjids as $masjid)
                    <option value="{{ $masjid->id }}">{{ $masjid->name }} ({{ $masjid->location }})</option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <i class="fas fa-link mr-1"></i> Assign Masjid
            </button>
        </form>
    </div>
</div>
@endsection