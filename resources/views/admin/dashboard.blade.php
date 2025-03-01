@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')
@section('header', 'Dashboard Overview')

@section('content')
<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-mosque text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Total Masjids</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">{{ $masjidCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-users text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Active Imams</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">{{ $imamCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-bell text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Announcements</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Masjids -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
    <div class="py-3 px-4 md:px-6 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <h3 class="text-lg font-semibold text-gray-800">Recently Added Masjids</h3>
        <a href="{{ route('admin.masjids') }}" class="text-sm text-green-600 hover:underline mt-1 sm:mt-0">View All</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imams</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentMasjids as $masjid)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $masjid->name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $masjid->location ?? 'Not specified' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $masjid->imams->count() }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                        <a href="{{ route('admin.masjids.edit', $masjid) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <a href="{{ route('admin.masjids.show', $masjid) }}" class="text-green-600 hover:text-green-900">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500">No masjids found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Recent Imams -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="py-3 px-4 md:px-6 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <h3 class="text-lg font-semibold text-gray-800">Active Imams</h3>
        <a href="{{ route('admin.imams') }}" class="text-sm text-green-600 hover:underline mt-1 sm:mt-0">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Masjids</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentImams as $imam)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $imam->name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $imam->email }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $imam->masjids->count() }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                        <a href="{{ route('admin.imams.edit', $imam) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <a href="{{ route('admin.imams.show', $imam) }}" class="text-green-600 hover:text-green-900">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500">No imams found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection