@extends('web.app')

@section('title', 'Careers')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
  body, * {
    font-family: 'Inter', sans-serif !important;
  }

  /* WOJE Color Variables */
  :root {
    --woje-red: #f53003;
    --woje-dark-red: #d02802;
    --woje-blue: #28a745;
    --woje-light-blue: #34ce57;
    --woje-green: #28a745;
    --woje-gold: #f8b803;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-up { animation: fadeUp 0.4s ease both; }
  .animate-delay-1 { animation-delay: 0.04s; }
  .animate-delay-2 { animation-delay: 0.10s; }
  .animate-delay-3 { animation-delay: 0.16s; }
  .animate-delay-4 { animation-delay: 0.22s; }
  .animate-delay-5 { animation-delay: 0.28s; }
  .animate-delay-6 { animation-delay: 0.34s; }

  /* ── Mobile Filter Drawer ── */
  #mobile-filter-drawer {
    position: fixed;
    top: 0; right: 0;
    width: 100%;
    height: 100%;
    background: #f5f8fc;
    z-index: 9999;
    transform: translateX(100%);
    transition: transform 0.32s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
    display: flex;
    flex-direction: column;
  }
  #mobile-filter-drawer.open {
    transform: translateX(0);
  }

  /* Overlay */
  #drawer-overlay {
    position: fixed;
    inset: 0;
    background: rgba(15, 30, 60, 0.45);
    z-index: 9998;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.32s ease;
  }
  #drawer-overlay.open {
    opacity: 1;
    pointer-events: auto;
  }

  /* "All Filters" trigger visible only on small screens */
  #all-filters-btn {
    display: none;
  }
  @media (max-width: 1023px) {
    #all-filters-btn {
      display: inline-flex;
    }
  }

  /* Drawer header */
  .drawer-header {
    position: sticky;
    top: 0;
    z-index: 10;
    background: #1e3a6e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.9rem 1.1rem;
    border-bottom: 3px solid #00a0c6;
    flex-shrink: 0;
  }
  .drawer-header h2 {
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin: 0;
  }
  .drawer-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: #b3e8f5;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.3rem 0.6rem;
    border-radius: 4px;
    transition: background 0.15s, color 0.15s;
  }
  .drawer-back-btn:hover {
    background: rgba(255,255,255,0.1);
    color: #fff;
  }

  /* Drawer body */
  .drawer-body {
    flex: 1;
    padding: 1.5rem;
    overflow-y: auto;
  }

  /* Drawer section title */
  .drawer-section-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: #1e3a6e;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  /* Drawer filter tags */
  .drawer-filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 2rem;
  }
  .drawer-filter-tag {
    padding: 0.5rem 1rem;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 500;
    color: #374151;
    cursor: pointer;
    transition: all 0.15s;
  }
  .drawer-filter-tag:hover {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }
  .drawer-filter-tag.active {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }

  /* Drawer category list */
  .drawer-cat-list {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
  }
  .drawer-cat-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    text-decoration: none;
    color: #374151;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.15s;
  }
  .drawer-cat-list a:hover {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }
  .drawer-cat-list .badge {
    background: #e5e7eb;
    color: #374151;
    padding: 0.125rem 0.5rem;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
  }
  .drawer-cat-list a:hover .badge {
    background: rgba(255,255,255,0.2);
    color: #fff;
  }

  /* ── Page Header ── */
  .page-header {
    background: linear-gradient(135deg, #1e3a6e 0%, #2d5a8a 100%);
    color: #fff;
    padding: 4rem 0 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.02)"/><circle cx="10" cy="50" r="0.5" fill="rgba(255,255,255,0.02)"/><circle cx="90" cy="30" r="0.5" fill="rgba(255,255,255,0.02)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
  }
  .page-header h1 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    position: relative;
    z-index: 1;
  }
  .page-header p {
    font-size: 1.125rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* ── Search Bar ── */
  .search-bar {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
  }
  .search-form {
    display: flex;
    gap: 0.75rem;
    align-items: center;
  }
  .search-input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.15s;
  }
  .search-input:focus {
    outline: none;
    border-color: #f53003;
    box-shadow: 0 0 0 3px rgba(245, 48, 3, 0.1);
  }
  .search-btn {
    padding: 0.75rem 1.5rem;
    background: #f53003;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s;
  }
  .search-btn:hover {
    background: #d02802;
  }

  /* ── Filter Tabs ── */
  .filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 2rem;
  }
  .filter-btn {
    padding: 0.5rem 1rem;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    cursor: pointer;
    transition: all 0.15s;
  }
  .filter-btn:hover {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }
  .filter-btn.active {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }

  /* ── News Cards ── */
  .news-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
    transition: all 0.3s;
    border-left: 3px solid transparent;
  }
  .news-card:hover {
    box-shadow: 0 8px 28px rgba(245,48,3,0.13);
    transform: translateY(-2px);
    border-left-color: #f53003;
  }
  .news-card-img {
    width: 100%;
    height: 160px;
    object-fit: cover;
  }
  .news-card-content {
    padding: 1.25rem;
  }
  .news-card-category {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 600;
    color: #f53003;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
    padding: 0.125rem 0;
    border-bottom: 1.5px solid #f53003;
  }
  .news-card-date {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
  }
  .news-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #28a745;
    margin-bottom: 0.75rem;
    line-height: 1.4;
    transition: color 0.15s;
  }
  .news-card-title:hover {
    color: #f53003;
  }
  .news-card-excerpt {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .news-card-link {
    color: #f53003;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.15s;
  }
  .news-card-link:hover {
    color: #d02802;
    letter-spacing: 0.08em;
  }

  /* ── Pagination ── */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.25rem;
    margin-top: 3rem;
  }
  .page-btn {
    padding: 0.5rem 0.75rem;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: #fff;
    color: #374151;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.15s;
  }
  .page-btn:hover {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }
  .page-btn.active {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }
  .page-btn.disabled {
    background: #f3f4f6;
    color: #9ca3af;
    cursor: not-allowed;
  }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .page-header h1 {
      font-size: 2rem;
    }
    .page-header p {
      font-size: 1rem;
    }
    .search-form {
      flex-direction: column;
    }
    .search-input {
      width: 100%;
    }
  }
</style>

{{-- Mobile Filter Drawer --}}
<div id="drawer-overlay"></div>
<div id="mobile-filter-drawer">
  <div class="drawer-header">
    <h2>Filters & Categories</h2>
    <button class="drawer-back-btn" id="drawer-close-btn" aria-label="Close filters">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
      </svg>
      Back
    </button>
  </div>

  {{-- Drawer Body --}}
  <div class="drawer-body">
    {{-- Search --}}
    <div>
      <div class="drawer-section-title">Search Careers</div>
      <form method="GET" action="{{ route('careers') }}" class="search-form">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search career opportunities..." class="search-input">
        <button type="submit" class="search-btn">Search</button>
      </form>
    </div>

    {{-- Categories --}}
    <div>
      <div class="drawer-section-title">Categories</div>
      <div class="drawer-cat-list">
        @foreach($categories as $category)
          <a href="{{ route('news') }}?category={{ $category->slug }}">
            <span>{{ $category->name }}</span>
            <span class="badge">{{ $category->news()->where('status', 'published')->count() }}</span>
          </a>
        @endforeach
      </div>
    </div>

  </div>
</div>

{{-- ─── Main Layout ─── --}}
<div class="max-w-7xl mx-auto px-4 py-10 bg-gray-50 min-h-[80vh]">
  <div class="flex flex-col lg:flex-row gap-8">

    {{-- ── LEFT: Careers List ── --}}
    <main class="flex-1 min-w-0">

      {{-- Page Header --}}
      <div class="page-header mb-8">
        <h1>Careers</h1>
        <p>Join WOJE and make a difference in women's empowerment and social justice</p>
      </div>

      {{-- Search Bar --}}
      <div class="search-bar">
        <form method="GET" action="{{ route('careers') }}" class="search-form">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search career opportunities..." class="search-input">
          <button type="submit" class="search-btn">Search</button>
        </form>
      </div>

      {{-- Careers Cards --}}
      <div class="flex flex-col gap-5">
        @forelse($careers as $career)
          <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(245,48,3,0.13)] hover:-translate-y-0.5 hover:border-l-[#f53003] animate-fade-up">
            <div class="relative w-full h-64 md:h-40 overflow-hidden shrink-0">
              @if($career->main_image)
                <img src="{{ asset($career->image_path) }}" alt="{{ $career->title }}" class="absolute inset-0 w-full h-full object-cover block transition-transform duration-400 hover:scale-105" />
              @else
                <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=440" alt="Career" class="absolute inset-0 w-full h-full object-cover transition-transform duration-400 hover:scale-105" />
              @endif
            </div>
            <div class="p-5 flex flex-col justify-between">
              <div>
                <div class="flex items-center gap-3 mb-2">
                  @if($career->category)
                    <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#f53003] py-0.5 border-b-[1.5px] border-[#f53003]">{{ $career->category->name }}</span>
                  @endif
                  <span class="text-[0.72rem] text-[#6b7280] font-normal">{{ $career->published_at->format('d F Y') }}</span>
                </div>
                <h2 class="text-xl font-semibold leading-6 text-[#28a745] mb-2 transition-colors hover:text-[#f53003]">
                  <a href="{{ route('news.newsReadMore', $career->slug) }}" class="no-underline text-inherit hover:text-[#f53003] transition-colors">{{ $career->title }}</a>
                </h2>
                <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                  {{ $career->excerpt }}
                </p>
              </div>
              <div class="mt-3">
                <a href="{{ route('news.newsReadMore',$career->slug) }}" class="text-xs font-semibold text-[#f53003] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#d02802]">
                  Read more <span>→</span>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">No career opportunities available at the moment.</p>
            <p class="text-gray-400 text-sm mt-2">Please check back later for new opportunities.</p>
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if($careers->hasPages())
        <div class="pagination">
          {{-- Previous --}}
          @if($careers->onFirstPage())
            <span class="page-btn disabled">‹ Prev</span>
          @else
            <a href="{{ $careers->previousPageUrl() }}" class="page-btn">‹ Prev</a>
          @endif

          {{-- Page Numbers --}}
          @foreach($careers->getUrlRange(1, $careers->lastPage()) as $page => $url)
            @if($page == $careers->currentPage())
              <span class="page-btn active">{{ $page }}</span>
            @else
              <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
            @endif
          @endforeach

          {{-- Next --}}
          @if($careers->hasMorePages())
            <a href="{{ $careers->nextPageUrl() }}" class="page-btn">Next ›</a>
          @else
            <span class="page-btn disabled">Next ›</span>
          @endif
        </div>
      @endif

    </main>

  </div>
</div>

<script>
  // Mobile filter drawer functionality
  const drawer = document.getElementById('mobile-filter-drawer');
  const overlay = document.getElementById('drawer-overlay');
  const closeBtn = document.getElementById('drawer-close-btn');

  function openDrawer() {
    drawer.classList.add('open');
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  // Close drawer when clicking overlay or close button
  overlay.addEventListener('click', closeDrawer);
  closeBtn.addEventListener('click', closeDrawer);

  // Close drawer on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('open')) {
      closeDrawer();
    }
  });
</script>

@endsection