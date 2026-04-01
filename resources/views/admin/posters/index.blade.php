@extends('admin.layouts.app')

@section('title', 'Poster Management')

@section('page-title', 'Poster Management')
@section('page-description', 'Manage noticeboard posters and announcements')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
    <div class="flex-1">
        <h1 class="text-2xl font-bold text-gray-900">Poster Management</h1>
        <p class="text-gray-600 mt-1">Manage noticeboard posters and announcements</p>
    </div>
    <a href="{{ route('admin.posters.create') }}" class="px-4 py-2 bg-woje-red text-white rounded-lg hover:bg-woje-orange transition-colors flex items-center gap-2 text-sm font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Add New Poster
    </a>
</div>

<!-- Posters Table -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posters as $poster)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 lg:px-6 py-4">
                            <img src="{{ $poster->image_url }}" alt="{{ $poster->title }}" class="w-16 h-16 object-cover rounded-lg">
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $poster->title }}</div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="text-sm text-gray-600 max-w-xs truncate">{{ $poster->description ?: 'No description' }}</div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            @if($poster->is_active)
                                <span class="px-2 py-1 text-xs font-medium text-woje-green bg-woje-green/10 rounded-full">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium text-gray-600 bg-gray-200 rounded-full">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-4 text-sm text-gray-500">
                            {{ $poster->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.posters.edit', $poster->id) }}" class="text-woje-blue hover:text-woje-orange transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.posters.destroy', $poster->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this poster?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6h4m4 6v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v4M7 19h10"></path>
                                </svg>
                                <p class="text-lg font-medium">No posters found</p>
                                <p class="text-sm text-gray-400 mt-2">Get started by creating your first poster.</p>
                                <a href="{{ route('admin.posters.create') }}" class="inline-flex items-center px-4 py-2 bg-woje-red text-white rounded-lg hover:bg-woje-orange transition-colors mt-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Poster
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($posters->hasPages())
        <div class="px-4 lg:px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="text-sm text-gray-700 text-center sm:text-left">
                Showing <span class="font-medium">{{ $posters->firstItem() }}</span> to <span class="font-medium">{{ $posters->lastItem() }}</span> of <span class="font-medium">{{ $posters->total() }}</span> results
            </div>
            <div class="flex items-center justify-center sm:justify-end gap-2">
                {{ $posters->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
