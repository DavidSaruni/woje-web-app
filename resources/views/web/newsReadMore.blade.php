@extends('web.app')

@section('title', 'Read more')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Quill CSS for proper content rendering -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
  .ql-editor {
    font-family: 'Inter', sans-serif;
    font-size: 1.125rem;
    line-height: 1.7;
    color: #374151;
  }
  
  .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6 {
    color: #28a745;
    font-weight: 600;
    margin-top: 1.5em;
    margin-bottom: 0.75em;
  }
  
  .ql-editor h1 { font-size: 2.25rem; }
  .ql-editor h2 { font-size: 1.875rem; }
  .ql-editor h3 { font-size: 1.5rem; }
  .ql-editor h4 { font-size: 1.25rem; }
  .ql-editor h5 { font-size: 1.125rem; }
  .ql-editor h6 { font-size: 1rem; }
  
  .ql-editor p {
    margin-bottom: 1em;
  }
  
  .ql-editor ul, .ql-editor ol {
    margin-bottom: 1em;
    padding-left: 1.5em;
  }
  
  .ql-editor li {
    margin-bottom: 0.5em;
  }
  
  .ql-editor blockquote {
    border-left: 4px solid #00a0c6;
    padding-left: 1em;
    margin: 1.5em 0;
    font-style: italic;
    color: #6b7280;
  }
  
  .ql-editor strong {
    font-weight: 600;
    color: #28a745;
  }
  
  .ql-editor em {
    font-style: italic;
  }
  
  .ql-editor a {
    color: #00a0c6;
    text-decoration: underline;
  }
  
  .ql-editor a:hover {
    color: #0077b6;
  }

  .ql-editor img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 1rem auto;
    border-radius: 0.375rem;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('nav a, header a, [class*="nav"] a, [id*="nav"] a');
    navLinks.forEach(function (link) {
      const href = link.getAttribute('href');
      if (href && href.startsWith('#') && href.length > 1) {
        link.setAttribute('href', '/' + href);
      }
    });
  });
</script>

<style>
  body, * {
    font-family: 'Inter', sans-serif !important;
  }

  /* Smooth scroll for anchor links */
  html {
    scroll-behavior: smooth;
  }
</style>

{{-- ─── Page Header ─── --}}
<div class=" bg-[#28a745] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">News &amp; Updates</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <a href="{{ url('/news') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">News</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Article</span>
    </div>
  </div>
</div>

{{-- ─── Main Content ─── --}}
<div class="max-w-7xl mx-auto px-4 py-10 bg-[#f5f8fc] min-h-screen">
  <div class="flex flex-col lg:flex-row gap-8">

    <article class="flex-1 min-w-0">
      
      @if($article)
      {{-- Article Card --}}
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        
        {{-- Featured Image (full image, natural aspect — no crop) --}}
        <div class="relative w-full bg-[#eef2f7]">
          @if($article->main_image)
            <img src="{{ $article->main_image_url }}" 
                 alt="{{ $article->title }}" 
                 class="block w-full h-auto max-w-full" />
          @else
            <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                 alt="News" 
                 class="block w-full h-auto max-w-full" />
          @endif
          <div class="absolute top-4 left-4">
            @if($article->category)
              <span class="inline-block text-xs font-semibold tracking-wider uppercase text-white bg-[#f53003] px-4 py-2 rounded-full shadow-md">
                {{ $article->category->name }}
              </span>
            @endif
          </div>
        </div>

        {{-- Article Header --}}
        <div class="p-8 lg:p-12 border-b border-[#f0f4f8]">
          <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-[#6b7280]">
            <div class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-[#00a0c6]">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
              </svg>
              <span>{{ $article->published_at->format('d F Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-[#f53003]">
                <path d="M6 2C3 2 0 0-2 2H2c0-1.1.9-2 2s2 .9 2 2h12c1.1 0 2-.9 2 2zm0 2H4v16h2V4zm4 0h12v16H4z"/>
                <path d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1H7.5V4a.5.5 0 0 1 .5-.5z"/>
              </svg>
              <span>{{ $article->read_time ?? 5 }} min read</span>
            </div>
            <div class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-[#00a0c6]">
                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12z"/>
                <path d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1H7.5V4a.5.5 0 0 1 .5-.5z"/>
              </svg>
              <span>By Woje Communications Team</span>
            </div>
          </div>

          <h1 class="text-3xl lg:text-4xl font-bold text-[#28a745] leading-tight mb-4">
            {{ $article->title }}
          </h1>

          <p class="text-lg text-[#6b7280] leading-relaxed">
            {{ $article->excerpt }}
          </p>
        </div>

        {{-- Article Content --}}
        <div class="p-8 lg:p-12">
          <div class="prose prose-lg max-w-none ql-editor" style="line-height: 1.6;">
            {!! $article->content !!}
          </div>
        </div>

      </div>

      {{-- Additional Images --}}
      @if($article->additional_images && count($article->additional_images) > 0)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
          <div class="p-8 lg:p-12">
            <h3 class="text-xl font-semibold mb-6 text-[#28a745]">Additional Images</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              @foreach($article->additional_images as $image)
                <div class="overflow-hidden rounded-lg bg-[#f5f7fa] flex items-center justify-center p-2 min-h-[12rem]">
                  <img src="{{ \App\Models\NewsArticle::publicUrlForStoredPath($image) }}" alt="{{ $article->title }}" class="max-h-[28rem] w-full object-contain hover:opacity-95 transition-opacity duration-300" />
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endif
    @else
      <div class="text-center py-12">
        <p class="text-gray-500 text-lg">Article not found.</p>
      </div>
    @endif


      {{-- Back to News --}}
      <div class="mt-6">
        <a href="{{ url('/news') }}" class="inline-flex items-center gap-2 text-[#28a745] hover:text-[#28a745] font-medium transition-colors no-underline">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
          Back to All News
        </a>
      </div>

    </article>

    {{-- ── RIGHT: Sidebar ── --}}
    <aside class="w-full lg:w-80 flex-shrink-0 flex flex-col gap-5">

      {{-- Related Articles --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] overflow-hidden">
        <div class="bg-[#28a745] text-white text-[0.78rem] font-semibold tracking-wider uppercase px-4 py-2.5 border-b-3 border-[#00a0c6]">Related Articles</div>
        <div class="divide-y divide-[#f0f4f8]">
          @forelse($relatedArticles ?? [] as $related)
            <a href="{{ route('news.newsReadMore', $related->slug) }}" class="block p-4 hover:bg-[#f0f4f8] transition-colors no-underline group">
              <div class="flex gap-3">
                @if($related->main_image)
                  <span class="w-20 h-20 shrink-0 rounded overflow-hidden bg-[#eef2f7] flex items-center justify-center p-0.5">
                    <img src="{{ $related->main_image_url }}" alt="{{ $related->title }}" class="max-w-full max-h-full w-auto h-auto object-contain" />
                  </span>
                @else
                  <span class="w-20 h-20 shrink-0 rounded overflow-hidden bg-[#eef2f7] flex items-center justify-center p-0.5">
                    <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=120" alt="Related" class="max-w-full max-h-full w-auto h-auto object-contain" />
                  </span>
                @endif
                <div class="flex-1 min-w-0">
                  @if($related->category)
                    <div class="text-[0.65rem] text-[#00a0c6] font-semibold uppercase tracking-wider mb-1">{{ $related->category->name }}</div>
                  @endif
                  <h4 class="text-sm font-semibold text-[#28a745] group-hover:text-[#00a0c6] transition-colors line-clamp-2 leading-snug">
                    {{ $related->title }}
                  </h4>
                  <div class="text-xs text-[#6b7280] mt-1">{{ $related->published_at->format('d M Y') }}</div>
                </div>
              </div>
            </a>
          @empty
            <div class="p-4 text-center text-gray-500">
              <p class="text-sm">No related articles found.</p>
            </div>
          @endforelse
        </div>
      </div>

      {{-- Contact CTA --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] p-6 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16" class="text-[#00a0c6] mx-auto mb-4">
          <path d="M3.654 1.328a.678.678 0 0 1 .736-.093l2.522 1a.678.678 0 0 1 .39.608v2.517a.678.678 0 0 1-.252.546L5.347 7.659a11.042 11.042 0 0 0 5.292 5.292l1.874-1.874a.678.678 0 0 1 .546-.252h2.517a.678.678 0 0 1 .608.39l1 2.522a.678.678 0 0 1-.093.736l-2.457 2.457c-.26.26-.67.36-1.02.24C4.567 13.281-.281 8.433-.04 3.707c.12-.35.32-.66.615-.952L3.654 1.328z"/>
        </svg>
        <h3 class="font-bold text-[#28a745] mb-2">Need More Information?</h3>
        <p class="text-sm text-[#6b7280] mb-4">Contact our team to learn more about our laboratory solutions.</p>
        <a href="{{ url('/#contact') }}" class="inline-block w-full bg-[#28a745] hover:bg-[#00a0c6] text-white py-2 px-6 rounded font-medium text-sm transition-colors no-underline">
          Contact Us
        </a>
      </div>

    </aside>

  </div>
</div>

@endsection