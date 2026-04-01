@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your WOJE news management system')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
    <!-- Total Articles -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 lg:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Articles</p>
                <p class="text-2xl font-bold text-gray-900">{{ $totalArticles }}</p>
                <p class="text-xs text-green-600 mt-2">+{{ $thisWeekArticles }} this week</p>
            </div>
            <div class="w-12 h-12 bg-woje-red/10 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-woje-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Published -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 lg:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Published</p>
                <p class="text-2xl font-bold text-gray-900">{{ $publishedArticles }}</p>
                <p class="text-xs text-gray-500 mt-2">{{ $totalArticles > 0 ? round(($publishedArticles / $totalArticles) * 100) : 0 }}% of total</p>
            </div>
            <div class="w-12 h-12 bg-woje-green/10 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-woje-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Draft -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 lg:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Draft</p>
                <p class="text-2xl font-bold text-gray-900">{{ $draftArticles }}</p>
                <p class="text-xs text-gray-500 mt-2">{{ $totalArticles > 0 ? round(($draftArticles / $totalArticles) * 100) : 0 }}% of total</p>
            </div>
            <div class="w-12 h-12 bg-woje-blue/10 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-woje-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Featured -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 lg:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Featured</p>
                <p class="text-2xl font-bold text-gray-900">{{ $featuredArticles }}</p>
                <p class="text-xs text-gray-500 mt-2">{{ $publishedArticles > 0 ? round(($featuredArticles / $publishedArticles) * 100) : 0 }}% of published</p>
            </div>
            <div class="w-12 h-12 bg-woje-orange/10 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-woje-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Articles -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h3 class="text-lg font-semibold text-gray-900">Recent Articles</h3>
            <a href="{{ route('admin.news.index') }}" class="text-sm text-woje-red hover:text-woje-orange transition-colors">View All</a>
        </div>
    </div>
    <div class="p-4 lg:p-6">
        <div class="space-y-3 lg:space-y-4">
            @forelse($recentArticles as $article)
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between p-3 lg:p-4 bg-gray-50 rounded-lg gap-3">
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 text-sm lg:text-base">{{ $article->title }}</h4>
                        <p class="text-sm text-gray-600 mt-1">
                            @if($article->status === 'published')
                                Published {{ $article->published_at ? $article->published_at->diffForHumans() : $article->created_at->diffForHumans() }}
                            @else
                                Last updated {{ $article->updated_at->diffForHumans() }}
                            @endif
                        </p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium {{ $article->status === 'published' ? 'text-woje-green bg-woje-green/10' : 'text-gray-600 bg-gray-200' }} rounded-full whitespace-nowrap self-start lg:self-auto">
                        {{ ucfirst($article->status) }}
                    </span>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500">No recent articles found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
