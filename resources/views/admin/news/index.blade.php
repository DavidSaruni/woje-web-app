@extends('admin.layouts.app')

@section('title', 'News Management')

@section('page-title', 'News Management')
@section('page-description', 'Manage your WOJE news articles and content')

@section('content')
<!-- Header Actions -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center gap-3 lg:gap-4">
        <div class="relative flex-1 sm:flex-initial">
            <input type="text" placeholder="Search articles..." class="w-full sm:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-woje-red focus:border-transparent text-sm">
            <svg class="absolute left-3 top-2.5 w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-woje-red focus:border-transparent text-sm">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-woje-red focus:border-transparent text-sm">
            <option value="">All Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-woje-red text-white rounded-lg hover:bg-woje-orange transition-colors flex items-center justify-center gap-2 text-sm font-medium">
        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span class="hidden sm:inline">New Article</span>
        <span class="sm:hidden">Add</span>
    </a>
</div>

<!-- News Table -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[600px]">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Category</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Featured</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Published</th>
                    <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($newsArticles as $article)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 lg:px-6 py-4">
                            <div>
                                <div class="text-sm font-medium text-gray-900 line-clamp-1">{{ $article->title }}</div>
                                <div class="text-sm text-gray-500 line-clamp-2 mt-1 hidden lg:block">{{ $article->excerpt }}</div>
                                <div class="mt-2 lg:hidden">
                                    @if($article->category)
                                        <span class="px-2 py-1 text-xs font-medium text-woje-blue bg-woje-blue/10 rounded-full mr-2">
                                            {{ $article->category->name }}
                                        </span>
                                    @endif
                                    @if($article->featured)
                                        <span class="px-2 py-1 text-xs font-medium text-woje-orange bg-woje-orange/10 rounded-full mr-2">Featured</span>
                                    @endif
                                    <div class="text-xs text-gray-500 mt-1">
                                        @if($article->published_at)
                                            {{ $article->published_at->format('M d, Y') }}
                                        @else
                                            Not published
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4 hidden sm:table-cell">
                            @if($article->category)
                                <span class="px-2 py-1 text-xs font-medium text-woje-blue bg-woje-blue/10 rounded-full">
                                    {{ $article->category->name }}
                                </span>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            @if($article->status === 'published')
                                <span class="px-2 py-1 text-xs font-medium text-woje-green bg-woje-green/10 rounded-full">Published</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium text-gray-600 bg-gray-200 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-4 hidden lg:table-cell">
                            @if($article->featured)
                                <span class="px-2 py-1 text-xs font-medium text-woje-orange bg-woje-orange/10 rounded-full">Featured</span>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-4 text-sm text-gray-500 hidden md:table-cell">
                            @if($article->published_at)
                                {{ $article->published_at->format('M d, Y') }}
                            @else
                                <span class="text-gray-400">Not published</span>
                            @endif
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.news.edit', $article->id) }}" class="text-woje-blue hover:text-woje-orange transition-colors">
                                    <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002 2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.news.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                        <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <p class="text-gray-500 text-lg">No news articles found.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-4 lg:px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="text-sm text-gray-700 text-center sm:text-left">
            Showing <span class="font-medium">{{ $newsArticles->firstItem() }}</span> to <span class="font-medium">{{ $newsArticles->lastItem() }}</span> of <span class="font-medium">{{ $newsArticles->total() }}</span> results
        </div>
        <div class="flex items-center justify-center sm:justify-end gap-2 flex-wrap">
            @if($newsArticles->onFirstPage())
                <span class="px-3 py-1 text-sm border border-gray-300 rounded text-gray-400 cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $newsArticles->previousPageUrl() }}" class="px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-50 transition-colors text-gray-700">Previous</a>
            @endif
            
            @foreach($newsArticles->links() as $link)
                @if($link->isActive())
                    <span class="px-3 py-1 text-sm bg-woje-red text-white rounded">{{ $link->label() }}</span>
                @else
                    <a href="{{ $link->url() }}" class="px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-50 transition-colors text-gray-700">{{ $link->label() }}</a>
                @endif
            @endforeach
            
            @if($newsArticles->hasMorePages())
                <a href="{{ $newsArticles->nextPageUrl() }}" class="px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-50 transition-colors text-gray-700">Next</a>
            @else
                <span class="px-3 py-1 text-sm border border-gray-300 rounded text-gray-400 cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[type="text"][placeholder="Search articles..."]');
    const categorySelect = document.querySelector('select'); // First select is category
    const statusSelect = document.querySelectorAll('select')[1]; // Second select is status
    const tableRows = document.querySelectorAll('tbody tr');
    const noResultsRow = document.querySelector('td[colspan="6"]');
    
    function filterArticles() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const selectedCategory = categorySelect ? categorySelect.value.toLowerCase() : '';
        const selectedStatus = statusSelect ? statusSelect.value.toLowerCase() : '';
        let visibleCount = 0;
        
        // Debug logging
        console.log('Filtering:', { searchTerm, selectedCategory, selectedStatus });
        
        tableRows.forEach(row => {
            // Skip the "no results" row
            if (row.querySelector('td[colspan="6"]')) {
                return;
            }
            
            const titleCell = row.querySelector('td:first-child .text-sm.font-medium');
            const excerptCell = row.querySelector('td:first-child .text-sm.text-gray-500');
            // Find category cell - it might be in different positions on mobile
            let categoryCell = row.querySelector('td:nth-child(2) span'); // Desktop position
            if (!categoryCell) {
                // On mobile, category might be in the first cell
                categoryCell = row.querySelector('td:first-child .px-2.py-1');
            }
            
            const statusCell = row.querySelector('td:nth-child(3) span'); // Status column
            if (!statusCell) {
                // On mobile, status might be in a different position
                statusCell = row.querySelector('td:first-child .text-woje-green, td:first-child .text-gray-600');
            }
            
            if (titleCell && excerptCell) {
                const title = titleCell.textContent.toLowerCase();
                const excerpt = excerptCell.textContent.toLowerCase();
                const category = categoryCell ? categoryCell.textContent.toLowerCase() : '';
                const status = statusCell ? statusCell.textContent.toLowerCase() : '';
                
                // Check if row matches all filters
                const matchesSearch = searchTerm === '' || title.includes(searchTerm) || excerpt.includes(searchTerm);
                const matchesCategory = selectedCategory === '' || category.includes(selectedCategory) || 
                                   selectedCategory === 'all categories' || 
                                   (selectedCategory === 'published' && category.includes('published')) ||
                                   (selectedCategory === 'draft' && category.includes('draft'));
                const matchesStatus = selectedStatus === '' || status.includes(selectedStatus);
                
                // Debug logging for each row
                console.log('Row:', { 
                    title: titleCell.textContent, 
                    category, 
                    status, 
                    matchesCategory, 
                    matchesStatus 
                });
                
                if (matchesSearch && matchesCategory && matchesStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            }
        });
        
        // Update no results message
        updateNoResultsMessage(visibleCount, searchTerm, selectedCategory, selectedStatus);
        
        // Update search highlighting
        updateSearchHighlighting(searchTerm);
    }
    
    function updateNoResultsMessage(visibleCount, searchTerm, selectedCategory, selectedStatus) {
        if (noResultsRow) {
            const noResultsRowParent = noResultsRow.parentElement;
            if (visibleCount === 0) {
                noResultsRowParent.style.display = '';
                
                let message = 'No articles found';
                let filters = [];
                
                if (searchTerm) filters.push(`matching "${searchTerm}"`);
                if (selectedCategory) filters.push(`in category "${selectedCategory}"`);
                if (selectedStatus) filters.push(`with status "${selectedStatus}"`);
                
                if (filters.length > 0) {
                    message += ' ' + filters.join(' ');
                }
                
                noResultsRow.innerHTML = `
                    <td colspan="6" class="px-6 py-12 text-center">
                        <p class="text-gray-500 text-lg">${message}.</p>
                        <p class="text-gray-400 text-sm mt-2">Try adjusting your filters or search term.</p>
                    </td>
                `;
            } else {
                noResultsRowParent.style.display = 'none';
            }
        }
    }
    
    function updateSearchHighlighting(searchTerm) {
        tableRows.forEach(row => {
            if (row.style.display !== 'none') {
                const titleCell = row.querySelector('td:first-child .text-sm.font-medium');
                if (titleCell) {
                    const originalText = titleCell.textContent;
                    
                    if (searchTerm.length > 0) {
                        const regex = new RegExp(`(${searchTerm})`, 'gi');
                        if (originalText.toLowerCase().includes(searchTerm.toLowerCase())) {
                            titleCell.innerHTML = originalText.replace(regex, '<mark class="bg-yellow-200">$1</mark>');
                        } else {
                            titleCell.innerHTML = originalText;
                        }
                    } else {
                        // Remove highlighting when search is cleared
                        titleCell.innerHTML = originalText;
                    }
                }
            }
        });
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterArticles);
    }
    
    if (categorySelect) {
        categorySelect.addEventListener('change', filterArticles);
    }
    
    if (statusSelect) {
        statusSelect.addEventListener('change', filterArticles);
    }
});
</script>
@endpush
