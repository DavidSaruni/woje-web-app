@extends('web.app')

@section('title', 'News & Updates')

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
  .drawer-back-btn svg {
    flex-shrink: 0;
  }

  /* Drawer body */
  .drawer-body {
    padding: 1.2rem 1rem 2rem;
    display: flex;
    flex-direction: column;
    gap: 1.1rem;
  }

  /* Drawer section titles */
  .drawer-section-title {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #6b7280;
    margin-bottom: 0.5rem;
  }

  /* Search in drawer */
  .drawer-search-wrap {
    display: flex;
    border: 1.5px solid #c8dce8;
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
    transition: border-color 0.15s;
  }
  .drawer-search-wrap:focus-within {
    border-color: #00a0c6;
  }
  .drawer-search-wrap input {
    flex: 1;
    padding: 0.55rem 0.8rem;
    font-size: 0.82rem;
    border: none;
    outline: none;
    background: transparent;
    color: #1e3a6e;
  }
  .drawer-search-wrap input::placeholder { color: #bbb; }
  .drawer-search-wrap button {
    background: #1e3a6e;
    color: #fff;
    border: none;
    padding: 0 0.85rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: background 0.15s;
  }
  .drawer-search-wrap button:hover { background: #00a0c6; }

  /* Category list in drawer */
  .drawer-cat-list {
    background: #fff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
  }
  .drawer-cat-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.65rem 1rem;
    border-bottom: 1px solid #f0f4f8;
    font-size: 0.83rem;
    color: #374151;
    text-decoration: none;
    transition: background 0.12s, color 0.12s;
  }
  .drawer-cat-list a:last-child { border-bottom: none; }
  .drawer-cat-list a:hover { background: #eaf6fb; color: #1e3a6e; }
  .drawer-cat-list a span.badge {
    font-size: 0.68rem;
    font-weight: 600;
    background: #eaf6fb;
    color: #0077b6;
    border-radius: 9999px;
    padding: 0.15rem 0.55rem;
  }

  /* Filter tags in drawer */
  .drawer-filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.45rem;
  }
  .drawer-filter-tag {
    padding: 0.45rem 0.85rem;
    border: 1px solid #c8dce8;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
    color: #1e3a6e;
    background: #fff;
    cursor: pointer;
    transition: all 0.15s;
    letter-spacing: 0.04em;
    user-select: none;
  }
  .drawer-filter-tag:hover,
  .drawer-filter-tag.active {
    background: #f53003;
    color: #fff;
    border-color: #f53003;
  }

  /* Active desktop filter tab */
  .filter-btn.active {
    background: #f53003 !important;
    color: #fff !important;
    border-color: #f53003 !important;
  }
</style>

{{-- ─── Page Header ─── --}}
<div class="mt-8 bg-[#28a745] border-b-4 border-[#28a745] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Blog</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-white transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-white">Blogs</span>
    </div>
  </div>
</div>

{{-- ─── Mobile Filter Drawer ─── --}}
<div id="drawer-overlay"></div>

<div id="mobile-filter-drawer" role="dialog" aria-modal="true" aria-label="Filters">
  {{-- Sticky Header --}}
  <div class="drawer-header">
    <h2>Search &amp; Filter</h2>
    <button class="drawer-back-btn" id="drawer-close-btn" aria-label="Close filters">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
      </svg>
      Back
    </button>
  </div>

  {{-- Drawer Body --}}
  <div class="drawer-body">


    <div>
      <div class="drawer-section-title">Filter by Topic</div>
      <div class="drawer-filter-tags">
        <button class="drawer-filter-tag" data-category="">All News</button>
        <button class="drawer-filter-tag" data-category="biosciences">BioSciences</button>
        <button class="drawer-filter-tag" data-category="medtech-solutions">MedTech</button>
        <button class="drawer-filter-tag" data-category="calibration-metrology">Calibration</button>
        <button class="drawer-filter-tag" data-category="partnerships">Partnerships</button>
        <button class="drawer-filter-tag" data-category="health-systems-advisory">Health Systems</button>
        <button class="drawer-filter-tag" data-category="quality-compliance">Quality &amp; Compliance</button>
      </div>
    </div>

    {{-- Categories --}}
    <div>
      <div class="drawer-section-title">Categories</div>
      <div class="drawer-cat-list">
        @foreach($categories as $category)
          <a href="{{ url()->current() }}?category={{ $category->slug }}">
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

    {{-- ── LEFT: News List ── --}}
    <main class="flex-1 min-w-0">

      {{-- "All Filters" trigger (mobile only) + Filter tabs --}}
      <div class="mb-7">

        {{-- Mobile: All Filters button shown above tabs on small screens --}}
        <button
          id="all-filters-btn"
          aria-label="Open all filters"
          class="mb-3 items-center gap-2 px-4 py-2 bg-[#28a745] text-white text-xs font-semibold tracking-wider uppercase rounded transition-colors hover:bg-[#f53003] cursor-pointer border-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" class="inline-block -mt-0.5 mr-1">
            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
          </svg>
          All Filters &amp; Categories →
        </button>

        {{-- Filter tabs using WOJE categories --}}
        <div class="flex flex-wrap gap-2">
          <button class="filter-btn px-3.5 py-1.5 border border-gray-200 rounded text-xs font-medium cursor-pointer transition-all text-[#28a745] bg-white hover:bg-[#28a745] hover:text-white hover:border-[#28a745] tracking-wide {{ request('category') === '' ? 'bg-[#28a745] text-white border-[#28a745]' : '' }}" data-category="">All News</button>
          @foreach($categories as $category)
            <button class="filter-btn px-3.5 py-1.5 border border-gray-200 rounded text-xs font-medium cursor-pointer transition-all text-[#28a745] bg-white hover:bg-[#28a745] hover:text-white hover:border-[#28a745] tracking-wide {{ request('category') === $category->slug ? 'bg-[#28a745] text-white border-[#28a745]' : '' }}" data-category="{{ $category->slug }}">{{ $category->name }}</button>
          @endforeach
        </div>
      </div>

      {{-- News Cards --}}
      <div class="flex flex-col gap-5">
        @forelse($news as $article)
          <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(245,48,3,0.13)] hover:-translate-y-0.5 hover:border-l-[#f53003] animate-fade-up">
            <div class="relative w-full h-64 md:h-40 overflow-hidden shrink-0">
              @if($article->main_image)
                <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover block transition-transform duration-400 hover:scale-105" />
              @else
                <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=440" alt="News" class="absolute inset-0 w-full h-full object-cover transition-transform duration-400 hover:scale-105" />
              @endif
            </div>
            <div class="p-5 flex flex-col justify-between">
              <div>
                <div class="flex items-center gap-3 mb-2">
                  @if($article->category)
                    <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#f53003] py-0.5 border-b-[1.5px] border-[#f53003]">{{ $article->category->name }}</span>
                  @endif
                  <span class="text-[0.72rem] text-[#6b7280] font-normal">{{ $article->published_at->format('d F Y') }}</span>
                </div>
                <h2 class="text-xl font-semibold leading-6 text-[#28a745] mb-2 transition-colors hover:text-[#f53003]">
                  <a href="" class="no-underline text-inherit hover:text-[#f53003] transition-colors">{{ $article->title }}</a>
                </h2>
                <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                  {{ $article->excerpt }}
                </p>
              </div>
              <div class="mt-3">
                <a href="{{ route('news.newsReadMore',$article->slug) }}" class="text-xs font-semibold text-[#f53003] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#d02802]">
                  Read more <span>→</span>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No news articles found.</p>
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if($news->hasPages())
        <div class="flex items-center gap-1 mt-8">
          {{-- Prev --}}
          @if($news->onFirstPage())
            <span class="page-btn px-3.5 h-[34px] flex items-center justify-center border border-gray-300 rounded text-xs font-medium text-gray-400 bg-white cursor-not-allowed">‹ Prev</span>
          @else
            <a href="{{ $news->previousPageUrl() }}" class="page-btn px-3.5 h-[34px] flex items-center justify-center border border-gray-300 rounded text-xs font-medium cursor-pointer transition-all text-[#28a745] bg-white hover:bg-[#28a745] hover:text-white hover:border-[#28a745] no-underline">‹ Prev</a>
          @endif

          {{-- Page numbers --}}
          @foreach($news->getUrlRange(1, $news->lastPage()) as $page => $url)
            @if($page == $news->currentPage())
              <span class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#28a745] rounded text-[0.8rem] font-medium bg-[#28a745] text-white">{{ $page }}</span>
            @elseif($page == 1 || $page == $news->lastPage() || abs($page - $news->currentPage()) <= 2)
              <a href="{{ $url }}" class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-gray-300 rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#28a745] bg-white hover:bg-[#28a745] hover:text-white hover:border-[#28a745] no-underline">{{ $page }}</a>
            @elseif($page == 2 && $news->currentPage() > 4)
              <span class="px-1 text-sm text-gray-400">…</span>
            @elseif($page == $news->lastPage() - 1 && $news->currentPage() < $news->lastPage() - 3)
              <span class="px-1 text-sm text-gray-400">…</span>
            @endif
          @endforeach

          {{-- Next --}}
          @if($news->hasMorePages())
            <a href="{{ $news->nextPageUrl() }}" class="page-btn px-3.5 h-[34px] flex items-center justify-center border border-gray-300 rounded text-xs font-medium cursor-pointer transition-all text-[#28a745] bg-white hover:bg-[#28a745] hover:text-white hover:border-[#28a745] no-underline">Next ›</a>
          @else
            <span class="page-btn px-3.5 h-[34px] flex items-center justify-center border border-gray-300 rounded text-xs font-medium text-gray-400 bg-white cursor-not-allowed">Next ›</span>
          @endif
        </div>
      @endif

    </main>

    {{-- ── RIGHT: Sidebar (desktop only) ── --}}
    <aside class="hidden lg:flex w-64 flex-shrink-0 flex-col gap-5">



      {{-- Categories real anchor links, highlighted when active --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] overflow-hidden">
        <div class="bg-[#28a745] text-white text-[0.78rem] font-semibold tracking-wider uppercase px-4 py-2.5 border-b-3 border-[#f53003]">Categories</div>
        <div>
          @foreach($categories as $category)
            <a href="{{ url()->current() }}?category={{ $category->slug }}" class="flex justify-between items-center px-4 py-2 border-b border-gray-100 text-[0.82rem] font-normal text-gray-700 cursor-pointer transition-all no-underline hover:bg-red-50 hover:text-[#f53003] last:border-b-0 {{ request('category') === $category->slug ? 'bg-red-50 text-[#f53003] font-semibold' : '' }}">
              <span>{{ $category->name }}</span><span class="text-[0.7rem] font-medium bg-red-50 text-[#f53003] rounded-full px-2 py-0.5">{{ $category->news()->where('status', 'published')->count() }}</span>
            </a>
          @endforeach
        </div>
      </div>

      {{-- Quick Contact --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] overflow-hidden">
        <div class="bg-[#28a745] text-white text-[0.78rem] font-semibold tracking-wider uppercase px-4 py-2.5 border-b-3 border-[#f53003]">Contact WOJE</div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-gray-100 text-[0.8rem] text-gray-700 leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-red-50 rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#f53003]">
              <path d="M3.654 1.328a.678.678 0 0 1 .736-.093l2.522 1a.678.678 0 0 1 .39.608v2.517a.678.678 0 0 1-.252.546L5.347 7.659a11.042 11.042 0 0 0 5.292 5.292l1.874-1.874a.678.678 0 0 1 .546-.252h2.517a.678.678 0 0 1 .608.39l1 2.522a.678.678 0 0 1-.093.736l-2.457 2.457c-.26.26-.67.36-1.02.24C4.567 13.281-.281 8.433-.04 3.707c.12-.35.32-.66.615-.952L3.654 1.328z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-gray-500 mb-0.5">Telephone</div>
            <a href="tel:+254705435438" class="text-[#f53003] no-underline font-medium block hover:text-[#d02802] transition-colors">+254 705 435 438</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-gray-100 text-[0.8rem] text-gray-700 leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-red-50 rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#f53003]">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-gray-500 mb-0.5">Email</div>
            <a href="mailto:info@woje.org" class="text-[#f53003] no-underline font-medium block hover:text-[#d02802] transition-colors">info@woje.org</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-gray-100 text-[0.8rem] text-gray-700 leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-red-50 rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#f53003]">
              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-gray-500 mb-0.5">Physical Address</div>
            <span>Loriki Boma, Gudele North<br>Mundri Road, Juba CES<br>South Sudan</span>
          </div>
        </div>

        <div class="p-3 px-4">
          <a href="{{ url('/#contact') }}" class="block text-center px-2 py-2 text-[0.72rem] font-semibold tracking-wider uppercase text-white bg-[#f53003] rounded no-underline transition-colors hover:bg-[#d02802]">
            Send Us a Message →
          </a>
        </div>
      </div>

    </aside>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {

    // ── Central navigate function ──
    // Builds the URL correctly, always resets page to 1
    function navigate(category, search) {
      var url = new URL(window.location.href);
      url.searchParams.delete('page');

      if (category !== undefined) {
        if (category === '') {
          url.searchParams.delete('category');
        } else {
          url.searchParams.set('category', category);
        }
      }
      if (search !== undefined) {
        if (search.trim() === '') {
          url.searchParams.delete('search');
        } else {
          url.searchParams.set('search', search.trim());
        }
      }
      window.location.href = url.toString();
    }

    // ── Desktop filter tabs clears search when filtering by category ──
    document.querySelectorAll('.filter-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var url = new URL(window.location.href);
        url.searchParams.delete('page');
        url.searchParams.delete('search');
        if (this.dataset.category === '') {
          url.searchParams.delete('category');
        } else {
          url.searchParams.set('category', this.dataset.category);
        }
        window.location.href = url.toString();
      });
    });

    // ── Drawer quick-filter tags also clears search ──
    document.querySelectorAll('.drawer-filter-tag').forEach(function (tag) {
      tag.addEventListener('click', function () {
        var url = new URL(window.location.href);
        url.searchParams.delete('page');
        url.searchParams.delete('search');
        if (this.dataset.category === '') {
          url.searchParams.delete('category');
        } else {
          url.searchParams.set('category', this.dataset.category);
        }
        window.location.href = url.toString();
      });
    });

    // ── Desktop sidebar search: Enter key or button click ──
    var desktopInput     = document.getElementById('desktop-search-input');
    var desktopSearchBtn = document.getElementById('desktop-search-btn');

    if (desktopInput) {
      desktopInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') navigate(undefined, this.value);
      });
    }
    if (desktopSearchBtn) {
      desktopSearchBtn.addEventListener('click', function () {
        if (desktopInput) navigate(undefined, desktopInput.value);
      });
    }

    // ── Drawer search: Enter key or button click ──
    var drawerInput     = document.getElementById('drawer-search-input');
    var drawerSearchBtn = document.getElementById('drawer-search-btn');

    if (drawerInput) {
      drawerInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') navigate(undefined, this.value);
      });
    }
    if (drawerSearchBtn) {
      drawerSearchBtn.addEventListener('click', function () {
        if (drawerInput) navigate(undefined, drawerInput.value);
      });
    }

    // ── Highlight active tab & drawer tag on page load ──
    var currentCategory = new URLSearchParams(window.location.search).get('category') || '';

    document.querySelectorAll('.filter-btn').forEach(function (btn) {
      if (btn.dataset.category === currentCategory) {
        btn.classList.add('active');
      }
    });
    document.querySelectorAll('.drawer-filter-tag').forEach(function (tag) {
      if (tag.dataset.category === currentCategory) {
        tag.classList.add('active');
      }
    });

    // ── Drawer open / close ──
    var drawer   = document.getElementById('mobile-filter-drawer');
    var overlay  = document.getElementById('drawer-overlay');
    var openBtn  = document.getElementById('all-filters-btn');
    var closeBtn = document.getElementById('drawer-close-btn');

    function openDrawer() {
      drawer.classList.add('open');
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
      setTimeout(function () {
        if (drawerInput) drawerInput.focus();
      }, 350);
    }

    function closeDrawer() {
      drawer.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }

    if (openBtn)  openBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeDrawer();
    });

    // ── Fix nav hash links ──
    document.querySelectorAll('nav a, header a, [class*="nav"] a, [id*="nav"] a').forEach(function (link) {
      var href = link.getAttribute('href');
      if (href && href.startsWith('#') && href.length > 1) {
        link.setAttribute('href', '/' + href);
      }
    });

  });
</script>

@endsection