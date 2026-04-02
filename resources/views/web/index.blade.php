@extends('web.app')



@section('title','Home')



@section('content')


  <!-- HERO SLIDER -->
  <section class="relative bg-gray-900 overflow-hidden" style="height: 90vh; min-height: 500px;">
    <!-- Slide 1 -->
    <div class="hero-slide active absolute inset-0" id="slide-1">
      <img src="{{ asset('woje-community.jpeg') }}" alt="WOJE Staff" class="w-full h-full object-cover opacity-60" onerror="this.style.display='none'" />
      <div class="absolute inset-0 bg-gradient-to-r from-woje-gray-300 via-woje-gray-100 to-transparent"></div>
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
          <div class="max-w-2xl">
            <span class="inline-block bg-accent text-white text-md font-bold px-4 py-2 rounded-full mb-4 uppercase tracking-wider">Featured Story</span>
            <h1 class="text-5xl md:text-6xl lg:text-6xl font-bold text-white leading-tight mb-6">Building Resilient Women and Inclusive Communities</h1>
            <p class="text-white/90 text-xl mb-10 leading-relaxed">In Fragile Contexts Zabib Musa Loro, Executive Director of WOJE, shares how the organization is transforming lives.</p>
            <div class="flex gap-4 flex-wrap">
              <a href="#" class="bg-accent hover:bg-red-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all shadow-lg">Read Story</a>
              <a href="#about" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-primary transition-all">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide absolute inset-0" id="slide-2">
      <img src="{{ asset('woje-community.jpeg') }}" alt="Community" class="w-full h-full object-cover opacity-60" onerror="this.style.display='none'" />
      <div class="absolute inset-0 bg-gradient-to-r from-woje-gray-300 via-woje-gray-100 to-transparent"></div>
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
          <div class="max-w-2xl">
            <span class="inline-block bg-gold text-white text-xs font-bold px-4 py-1 rounded-full mb-4 uppercase tracking-wider">Our Mission</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">Empowering Women, Transforming Communities</h1>
            <p class="text-white/80 text-lg mb-8">Through education, health, and economic initiatives, WOJE creates lasting change across South Sudan.</p>
            <div class="flex gap-4 flex-wrap">
              <a href="#programs" class="bg-accent hover:bg-red-700 text-white px-7 py-3 rounded-full font-semibold transition-all shadow-lg">Our Programs</a>
              <a href="#impact" class="border-2 border-white text-white px-7 py-3 rounded-full font-semibold hover:bg-white hover:text-primary transition-all">See Impact</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide absolute inset-0" id="slide-3">
      <img src="{{ asset('peacebuilding-event.jpeg') }}" alt="Peacebuilding" class="w-full h-full object-cover opacity-60" onerror="this.style.display='none'" />
      <div class="absolute inset-0 bg-gradient-to-r from-woje-gray-300 via-woje-gray-100 to-transparent"></div>
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
          <div class="max-w-2xl">
            <span class="inline-block bg-primary text-white text-xs font-bold px-4 py-1 rounded-full mb-4 uppercase tracking-wider">Peacebuilding</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">Women Leading Peace and Reconciliation</h1>
            <p class="text-white/80 text-lg mb-8">Highlighting the crucial role of women in peace processes and conflict transformation across South Sudan.</p>
            <div class="flex gap-4 flex-wrap">
              <a href="#programs" class="bg-accent hover:bg-red-700 text-white px-7 py-3 rounded-full font-semibold transition-all shadow-lg">Join Our Mission</a>
              <a href="#contact" class="border-2 border-white text-white px-7 py-3 rounded-full font-semibold hover:bg-white hover:text-primary transition-all">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slider Controls -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
      <button onclick="goToSlide(0)" class="slide-dot w-3 h-3 rounded-full bg-white transition-all" id="dot-0"></button>
      <button onclick="goToSlide(1)" class="slide-dot w-3 h-3 rounded-full bg-white/40 transition-all" id="dot-1"></button>
      <button onclick="goToSlide(2)" class="slide-dot w-3 h-3 rounded-full bg-white/40 transition-all" id="dot-2"></button>
    </div>
    <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all z-10">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7-7-7 7 7 7 7-7 7z"/></svg>
    </button>
    <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all z-10">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
  </section>

    <!-- News & Updates and Noticeboard Section -->
<section id="news-notices" class="pt-24 mb-16 bg-gray-50 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- News & Updates Column (2 columns) -->
            <div class="lg:col-span-2">
              <div class="flex items-center justify-between mb-10">
                <div>
                  <p class="text-accent font-semibold text-md uppercase tracking-wider mb-1">Stay Updated</p>
                  <h2 class="text-3xl font-bold text-gray-700">Latest from WOJE</h2>
                  <p class="text-gray-500 mt-1 text-md">Latest news, stories, and publications from across South Sudan and Uganda.</p>
                </div>
                
              </div>
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-700">News & Updates</h2>
                        </div>
                    </div>
                </div>

                 @php
                  $latest = \App\Models\NewsArticle::latest()->first();
                @endphp
                @if($latest)
                <!-- Single Large News Item (Full 2 columns) -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 mb-8">
                    <div class="grid md:grid-cols-2 gap-0">
                        <!-- Image Section -->
                        <div class="relative h-80 md:h-auto overflow-hidden">
                            @if($latest->main_image)
                                <img src="{{ $latest->main_image_url }}" 
                                     alt="{{ $latest->title }}" 
                                     class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500"
                                     onerror="this.style.background='#f3f4f6'">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-woje-green text-white px-3 py-1 rounded text-xs font-bold uppercase">
                                    News & Updates
                                </span>
                            </div>
                        </div>
                        <!-- latest news -->
                        
                        
                        <!-- Content Section -->
                        <div class="p-8 flex flex-col justify-center">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="text-xs text-gray-500">{{ $latest->published_at->format('F j, Y') }}</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="text-xs text-gray-500">WOJE Organization</span>
                            </div>
                            <h3 class="text-xl md:text-3xl font-bold text-gray-700 mb-4 leading-tight hover:text-woje-green transition-colors">
                                {{ $latest->title }}
                            </h3>
                            <p class="text-gray-600 text-md mb-6 leading-relaxed">
                                {{ $latest->excerpt }}
                            </p>
                            <a href="{{ route('news.newsReadMore', $latest->slug) }}" class="inline-flex items-center text-woje-red font-semibold hover:text-woje-orange w-fit">
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 - Featured -->
         <!-- last three news before the last one -->
          @php
            $latestThree = \App\Models\NewsArticle::latest()->skip('1')->take(3)->get();
          @endphp
          @forelse($latestThree as $news)
        <div class="md:col-span-1 bg-white rounded-2xl overflow-hidden shadow-sm card-hover border border-gray-100">
          <div class="relative">
            @if($news->main_image)
                <img src="{{ $news->main_image_url }}" alt="{{ $news->title }}" class="w-full h-56 object-cover" onerror="this.style.background='#f3e8ff'" />
            @else
                <div class="w-full h-56 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            @endif
            <div class="absolute top-3 left-3 flex gap-2">
              <span class="bg-woje-green text-white text-xs font-bold px-3 py-1 rounded-full">{{ $news->category->name }}</span>
            </div>
          </div>
          <div class="p-6">
            <p class="text-xs text-gray-400 mb-2"> · <span class="text-accent font-medium">{{ $news->published_at->format('M d, Y') }}</span></p>
            <h3 class="font-bold text-lg text-gray-700 mb-3 leading-tight">{{ $news->title }}</h3>
            <p class="text-gray-500 text-md leading-relaxed mb-4">{{ $news->excerpt }}</p>
            <div class="flex gap-3">
              <a href="{{ route('news.newsReadMore', $news->slug) }}" class="text-primary text-md font-semibold hover:text-accent transition-colors">Read more →</a>
            </div>
          </div>
        </div>
        @empty
        <div class="md:col-span-3 text-center py-12">
            <p class="text-gray-500 text-lg">No news articles available yet.</p>
        </div>
        @endforelse
 
      </div>

        <!-- Discover More Button -->
    <section class="pb-4 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            
            <div class="border-t border-gray-200 mb-16"></div>

            <div class="flex flex-col items-center justify-center">

                <!-- Load More Button -->
                <a 
                href="{{ route('news') }}"
                    id="loadMoreBtn"
                    class="group relative flex items-center gap-4 border border-woje-green px-6 md:px-12 py-5 text-md font-semibold uppercase tracking-widest text-gray-700 hover:text-white transition-all duration-300 overflow-hidden">
                    <span class="absolute inset-0 bg-woje-green -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-in-out z-0"></span>
                    <span class="relative z-10">Load More News</span>
                    <svg class="relative z-10 w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="hidden mt-8 flex-col items-center gap-4">
                    <div class="w-8 h-8 border-2 border-gray-200 border-t-woje-red rounded-full animate-spin"></div>
                    <p class="text-md text-gray-400 uppercase tracking-widest">Loading news...</p>
                </div>

                <!-- All Loaded Message -->
                <div id="allLoadedMsg" class="hidden mt-8 flex-col items-center gap-3">
                    <div class="w-12 h-12 bg-woje-red rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <p class="text-md text-gray-500 uppercase tracking-widest">All News Loaded</p>
                </div>

                <!-- View All Link -->
                <a href="{{ route('news') }}" class="mt-8 flex items-center gap-2 text-md text-gray-400 hover:text-woje-green transition-colors duration-300 uppercase tracking-widest">
                    <span>View All News</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>
            </div>

            <!-- WOJE Notice Board Column (1 column) -->
            <div>
                <div class="sticky top-8">
                    <div class="bg-gradient-to-br from-woje-red to-woje-orange text-white rounded-t-xl px-6 py-2 shadow-lg">
                        <h2 class="text-2xl font-bold mb-1">WOJE Notice Board</h2>
                        <p class="text-red-100 text-md">Important announcements & updates</p>
                    </div>
                    
                    <div class="bg-white rounded-b-xl shadow-lg overflow-hidden">
                        <!-- Single Large Notice Poster -->
                        <div class="md:p-4">
                            @php
                                $activePoster = \App\Models\Poster::getActive();
                            @endphp
                            
                            @if($activePoster)
                                <div class="group cursor-pointer">
                                    <div class="relative overflow-hidden md:rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                        <div class="relative w-full aspect-[3/4]">
                                            <img src="{{ asset($activePoster->image_path) }}"
                                                alt="{{ $activePoster->title }}"
                                                class="absolute inset-0 w-full h-full object-cover">
                                        </div>

                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                                <p class="text-white text-md font-semibold">{{ $activePoster->title }}</p>
                                                @if($activePoster->description)
                                                    <p class="text-white/90 text-sm mt-1">{{ Str::limit($activePoster->description, 80) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-image text-2xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 text-md">No active poster</p>
                                    <p class="text-gray-400 text-sm mt-1">Check back later for updates</p>
                                </div>
                            @endif
                        </div>

                        <!-- View All Notices Button -->
                        <div class="p-6 bg-gray-50 border-t border-gray-200">
                            <a href="#" class="block w-full text-center px-4 py-3 bg-woje-red text-white font-semibold rounded-lg hover:bg-red-700 transition-colors shadow-lg hover:shadow-xl">
                                View All Notices
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- LATEST FROM WOJE (featured strip) -->
  <section class="bg-gray-50 py-14" id="news">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      

      
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section id="about" class="py-20 bg-white">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div>
          <p class="text-accent font-semibold text-md uppercase tracking-wider mb-2">Who We Are</p>
          <h2 class="text-4xl font-bold text-gray-700 mb-2">About Us</h2>
          <div class="section-divider mb-6"></div>
          <p class="text-gray-600 text-lg leading-relaxed mb-6">Since 2016, WOJE has grown from a grassroots movement into a nationally recognized voice for feminist action and social justice in South Sudan. We are committed to advancing gender justice through transformative programming and evidence-informed advocacy.</p>
          <p class="text-gray-600 text-lg leading-relaxed mb-8">Our work spans five strategic priorities: Protection, Health, Peacebuilding, Governance & Justice, and Economic Empowerment. Through these interconnected approaches, we've reached over 110,000 individuals with life-changing programs.</p>

          <!-- Stats -->
          <div class="grid grid-cols-2 gap-6 mb-8">
            <div class="bg-gradient-to-br from-woje-green/5 to-woje-green-dark/5 rounded-2xl p-6 border border-woje-green/20">
              <div class="text-4xl font-bold text-woje-green mb-1">110K+</div>
              <div class="text-gray-600 font-medium text-md">Lives Impacted</div>
            </div>
            <div class="bg-gradient-to-br from-woje-green/5 to-woje-green-dark/5 rounded-2xl p-6 border border-woje-green/20">
              <div class="text-4xl font-bold text-woje-green mb-1">9</div>
              <div class="text-gray-600 font-medium text-md">Years of Service</div>
            </div>
          </div>

          <a href="#contact" class="inline-flex items-center gap-2 bg-woje-red text-white px-7 py-3 rounded-full font-semibold hover:bg-woje-red/90 transition-all shadow-md">
            Learn More About Us
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>

        <div class="relative">
          <img src="{{ asset('community-gathering.jpeg') }}" alt="WOJE community gathering" class="w-full h-96 object-cover rounded-3xl shadow-2xl" onerror="this.style.background='linear-gradient(135deg,#f53003,#ff6b35)'" />
        </div>
      </div>
    </div>
  </section>

  <!-- PROGRAMS -->
  <section id="programs" class="py-20 bg-white">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="text-center mb-14">
        <p class="text-accent font-semibold text-md uppercase tracking-wider mb-2">What We Do</p>
        <h2 class="text-4xl font-bold text-gray-700 mb-3">Our Transformative Programs</h2>
        <div class="section-divider mx-auto mb-4"></div>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">Our 2025–2030 strategic plan focuses on five key thematic areas to drive transformative change across South Sudan through comprehensive, interconnected approaches.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Protection -->
        <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover bg-white">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('protection-support.jpeg') }}" alt="Protection" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.background='#f3e8ff'" />
            <div class="absolute inset-0 bg-gradient-to-t from-primary/70 to-transparent"></div>
            <div class="absolute bottom-4 left-4">
              <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30">Protection</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Protection</h3>
            <p class="text-gray-500 text-md leading-relaxed">Safeguarding women and girls from violence, exploitation, and abuse through comprehensive support systems and survivor-centered approaches.</p>
          </div>
        </div>

        <!-- Health -->
        <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover bg-white">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('woje-community.jpeg') }}" alt="Health" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.background='#fdf2f8'" />
            <div class="absolute inset-0 bg-gradient-to-t from-accent/70 to-transparent"></div>
            <div class="absolute bottom-4 left-4">
              <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30">Health</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Health</h3>
            <p class="text-gray-500 text-md leading-relaxed">Ensuring equitable access to lifesaving health services and comprehensive reproductive health information for women and girls across South Sudan.</p>
          </div>
        </div>

        <!-- Peacebuilding -->
        <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover bg-white">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('peacebuilding-event.jpeg') }}" alt="Peacebuilding" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.background='#ede9fe'" />
            <div class="absolute inset-0 bg-gradient-to-t from-red-900/70 to-transparent"></div>
            <div class="absolute bottom-4 left-4">
              <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30">Peacebuilding</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Peacebuilding</h3>
            <p class="text-gray-500 text-md leading-relaxed">Supporting women's participation in peace processes and advocating for women's leadership in conflict resolution and community reconciliation.</p>
          </div>
        </div>

        <!-- Governance & Justice -->
        <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover bg-white">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('strategic-plan-launch.jpeg') }}" alt="Governance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.background='#f0fdf4'" />
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
            <div class="absolute bottom-4 left-4">
              <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30">Governance & Justice</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Governance & Justice</h3>
            <p class="text-gray-500 text-md leading-relaxed">Advancing legal reforms and improving women's access to justice systems while advocating for inclusive policies that promote gender equality and human rights.</p>
          </div>
        </div>

        <!-- Economic Empowerment -->
        <div class="group rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover bg-white md:col-span-2 lg:col-span-1">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('economic-empowerment-training.jpeg') }}" alt="Economic Empowerment" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.background='#fff7ed'" />
            <div class="absolute inset-0 bg-gradient-to-t from-orange-900/70 to-transparent"></div>
            <div class="absolute bottom-4 left-4">
              <span class="bg-white/20 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30">Economic Empowerment</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3">Economic Empowerment</h3>
            <p class="text-gray-500 text-md leading-relaxed">Providing vocational training, access to capital, and market-based solutions for enhanced resilience and economic autonomy for women and girls.</p>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="#contact" class="inline-block bg-woje-red text-white px-10 py-4 rounded-full font-semibold hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
          Learn More About Our Programs
          <svg class="w-5 h-5 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- TEAM -->
  <section id="team" class="py-20 bg-gray-50">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="text-center mb-14">
        <p class="text-accent font-semibold text-md uppercase tracking-wider mb-2">The People</p>
        <h2 class="text-4xl font-bold text-gray-700 mb-3">Meet Our Team</h2>
        <div class="section-divider mx-auto mb-4"></div>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">Meet the dedicated leaders guiding WOJE's mission with expertise, passion, and unwavering commitment to gender justice.</p>
      </div>

      <!-- Board of Directors -->
      <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Board of Directors</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-14">
        <div class="text-center card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-woje-green/30 transition-all">
          <img src="{{ asset('joyce-gaza-chairperson.jpeg') }}" alt="Joyce Ayoub" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-woje-green/20" onerror="this.style.background='#fef2f2'" />
          <h4 class="font-semibold text-gray-700 text-md mb-1">Ms. Joyce Ayoub Phillip Gaza</h4>
          <p class="text-woje-red text-xs font-medium mb-3">Chairperson Board of Directors</p>
          <a href="#" class="inline-block text-woje-red text-xs font-semibold hover:text-red-700 transition-colors">View Profile →</a>
        </div>
        <div class="text-center card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-woje-green/30 transition-all">
          <img src="{{ asset('catherine-visensio-lolika.jpg') }}" alt="Catherine Lolika" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-woje-green/20" onerror="this.style.background='#fef2f2'" />
          <h4 class="font-semibold text-gray-700 text-md mb-1">Ms. Catherine Visensio Lolika</h4>
          <p class="text-woje-red text-xs font-medium mb-3">Vice Chairperson</p>
          <span class="inline-block text-gray-400 text-xs">Coming Soon</span>
        </div>
        <div class="text-center card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-woje-green/30 transition-all">
          <img src="{{ asset('mariam-hamida.jpeg') }}" alt="Mariam Hamida" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-woje-green/20" onerror="this.style.background='#fef2f2'" />
          <h4 class="font-semibold text-gray-700 text-md mb-1">Ms. Mariam Hamida</h4>
          <p class="text-woje-red text-xs font-medium mb-3">Board Treasurer</p>
          <span class="inline-block text-gray-400 text-xs">Coming Soon</span>
        </div>
        <div class="text-center card-hover bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:border-woje-green/30 transition-all">
          <img src="{{ asset('zabibloro.jpeg') }}" alt="Zabib Loro" class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-woje-green/20" onerror="this.style.background='#fef2f2'" />
          <h4 class="font-semibold text-gray-700 text-md mb-1">Ms. Zabib Musa Loro</h4>
          <p class="text-woje-red text-xs font-medium mb-3">Board Secretary</p>
          <a href="#" class="inline-block text-woje-red text-xs font-semibold hover:text-red-700 transition-colors">View Profile →</a>
        </div>
      </div>

      <!-- Management Team -->
       <section class="pb-4 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            
            <div class="border-t border-gray-200 mb-16"></div>

            <div class="flex flex-col items-center justify-center">

                <!-- Load More Button -->
                <a 
                href="{{ route('board') }}"
                    id="loadMoreBtn"
                    class="group relative flex items-center gap-4 border border-woje-green px-6 md:px-12 py-5 text-md font-semibold uppercase tracking-widest text-gray-700 hover:text-white transition-all duration-300 overflow-hidden">
                    <span class="absolute inset-0 bg-woje-green -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-in-out z-0"></span>
                    <span class="relative z-10">Load Management Team Members</span>
                    <svg class="relative z-10 w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="hidden mt-8 flex-col items-center gap-4">
                    <div class="w-8 h-8 border-2 border-gray-200 border-t-woje-red rounded-full animate-spin"></div>
                    <p class="text-md text-gray-400 uppercase tracking-widest">Loading news...</p>
                </div>

                <!-- All Loaded Message -->
                <div id="allLoadedMsg" class="hidden mt-8 flex-col items-center gap-3">
                    <div class="w-12 h-12 bg-woje-red rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <p class="text-md text-gray-500 uppercase tracking-widest">All Management Team Members Loaded</p>
                </div>

                <!-- View All Link -->
                <a href="{{ route('board') }}" class="mt-8 flex items-center gap-2 text-md text-gray-400 hover:text-woje-green transition-colors duration-300 uppercase tracking-widest">
                    <span>View Management Team</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>
        
      </div>
    </div>
  </section>

  <!-- IMPACT GALLERY -->
  <section id="impact" class="py-20 bg-white">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="text-center mb-14">
        <p class="text-woje-red font-semibold text-md uppercase tracking-wider mb-2">Our Work</p>
        <h2 class="text-4xl font-bold text-gray-700 mb-3">Our Impact</h2>
        <div class="section-divider mx-auto mb-4"></div>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">Witness the transformative change we're creating across South Sudan through our comprehensive programs and initiatives.</p>
      </div>

      <!-- Professional Impact Gallery -->
      <div class="mb-16">
        <!-- Featured Impact Image -->
        <div class="mb-8">
          <div class="relative group overflow-hidden rounded-3xl shadow-2xl">
            <img src="{{ asset('community-gathering.jpeg') }}" alt="WOJE Community Impact" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-700" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8">
              <div class="text-white">
                <h3 class="text-3xl font-bold mb-3">Community Transformation</h3>
                <p class="text-white/90 text-lg mb-4">Empowering communities through education, health, and economic initiatives</p>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Impact Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Protection -->
          <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="{{ asset('protection-support.jpeg') }}" alt="Protection Services" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-woje-red/90 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="text-white">
                <h4 class="font-bold text-lg mb-1">Protection</h4>
                <p class="text-white/80 text-md">Safeguarding women and girls</p>
              </div>
            </div>
          </div>

          <!-- Health -->
          <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="{{ asset('woje-community.jpeg') }}" alt="Health Programs" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-woje-orange/90 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="text-white">
                <h4 class="font-bold text-lg mb-1">Health</h4>
                <p class="text-white/80 text-md">Healthcare access for all</p>
              </div>
            </div>
          </div>

          <!-- Peacebuilding -->
          <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="{{ asset('peacebuilding-event.jpeg') }}" alt="Peacebuilding" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-blue-600/90 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="text-white">
                <h4 class="font-bold text-lg mb-1">Peacebuilding</h4>
                <p class="text-white/80 text-md">Women leading peace</p>
              </div>
            </div>
          </div>

          <!-- Economic Empowerment -->
          <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
            <img src="{{ asset('economic-empowerment-training.jpeg') }}" alt="Economic Empowerment" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-green-600/90 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="text-white">
                <h4 class="font-bold text-lg mb-1">Economic</h4>
                <p class="text-white/80 text-md">Financial independence</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0">
      <img src="{{ asset('community-gathering.jpeg') }}" alt="bg" class="w-full h-full object-cover" onerror="this.style.background='#7B2D8B'" />
      <div class="absolute inset-0 bg-primary/90"></div>
    </div>
    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 text-center text-white">
      <p class="text-accent font-semibold text-md uppercase tracking-wider mb-4">Testimonials</p>
      <h2 class="text-3xl font-bold mb-10">Hear From Our Community</h2>
      
      <!-- Testimonial Carousel -->
      <div class="relative">
        <div class="testimonial-carousel overflow-hidden">
          <div class="testimonial-track flex transition-transform duration-500 ease-in-out">
            
            <!-- Testimonial 1 -->
            <div class="testimonial-slide min-w-full px-4">
              <div class="bg-white/10 backdrop-blur rounded-3xl p-10 border border-white/20">
                <svg class="w-10 h-10 text-accent mx-auto mb-6 opacity-60" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="text-white/90 text-xl leading-relaxed italic mb-8">"WOJE has been instrumental in empowering women in our community. Through their programs, I've gained the skills and confidence to start my own business and support my family. Their commitment to justice and equality is truly transformative."</p>
                <div>
                  <div class="font-bold text-white">Mary Akech</div>
                  <div class="text-white/60 text-md">Program Beneficiary, Juba</div>
                  <span class="inline-block mt-2 bg-accent/30 text-accent-light text-xs px-3 py-1 rounded-full">Economic Empowerment Program</span>
                </div>
              </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="testimonial-slide min-w-full px-4">
              <div class="bg-white/10 backdrop-blur rounded-3xl p-10 border border-white/20">
                <svg class="w-10 h-10 text-accent mx-auto mb-6 opacity-60" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="text-white/90 text-xl leading-relaxed italic mb-8">"The peacebuilding training I received from WOJE changed my perspective completely. I now lead community dialogues and help resolve conflicts peacefully. Women's voices are finally being heard."</p>
                <div>
                  <div class="font-bold text-white">Rebecca Nyok</div>
                  <div class="text-white/60 text-md">Peacebuilding Facilitator, Wau</div>
                  <span class="inline-block mt-2 bg-accent/30 text-accent-light text-xs px-3 py-1 rounded-full">Peacebuilding Program</span>
                </div>
              </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="testimonial-slide min-w-full px-4">
              <div class="bg-white/10 backdrop-blur rounded-3xl p-10 border border-white/20">
                <svg class="w-10 h-10 text-accent mx-auto mb-6 opacity-60" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="text-white/90 text-xl leading-relaxed italic mb-8">"WOJE's health education program saved my daughter's life. I learned about proper nutrition and healthcare, which helped me make informed decisions for my family's wellbeing."</p>
                <div>
                  <div class="font-bold text-white">Grace Michael</div>
                  <div class="text-white/60 text-md">Health Program Participant, Malakal</div>
                  <span class="inline-block mt-2 bg-accent/30 text-accent-light text-xs px-3 py-1 rounded-full">Health Education Program</span>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
        <!-- Carousel Controls -->
        <button class="testimonial-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white/20 backdrop-blur text-white p-3 rounded-full hover:bg-white/30 transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>
        <button class="testimonial-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white/20 backdrop-blur text-white p-3 rounded-full hover:bg-white/30 transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
        
        <!-- Carousel Indicators -->
        <div class="flex justify-center gap-2 mt-6">
          <button class="testimonial-dot w-2 h-2 bg-white/50 rounded-full transition-colors" data-slide="0"></button>
          <button class="testimonial-dot w-2 h-2 bg-white/30 rounded-full transition-colors" data-slide="1"></button>
          <button class="testimonial-dot w-2 h-2 bg-white/30 rounded-full transition-colors" data-slide="2"></button>
        </div>
      </div>
    </div>
  </section>


  <!-- PARTNERS -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="text-center mb-16">
        <p class="text-woje-red font-semibold text-md uppercase tracking-wider mb-2">Collaboration</p>
        <h2 class="text-4xl font-bold text-gray-700 mb-4">Our Partners & Donors</h2>
        <div class="section-divider mx-auto mb-6"></div>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">We're grateful for the allies who power our mission and support our vision for gender justice across South Sudan.</p>
      </div>

      <!-- Moving Partners Logos -->
      <div class="relative overflow-hidden">
        <!-- Single Row - Moving Left -->
        <div class="flex animate-scroll-left">
          <div class="flex gap-12 items-center">
            <img src="{{ asset('partners/musawah.png') }}" alt="Musawah" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>Musawah</span>'" />
            <img src="{{ asset('partners/saferworld.png') }}" alt="Saferworld" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>Saferworld</span>'" />
            <img src="{{ asset('partners/shesthefirst.png') }}" alt="She's the First" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>She\'s the First</span>'" />
            <img src="{{ asset('partners/sihanetwork.png') }}" alt="SIHA Network" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>SIHA Network</span>'" />
            <img src="{{ asset('partners/peacebuilding-fund.jpeg') }}" alt="UN Peacebuilding Fund" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>UN Peacebuilding</span>'" />
            <img src="{{ asset('partners/undp.png') }}" alt="UNDP" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>UNDP</span>'" />
            <img src="{{ asset('partners/unimiss.png') }}" alt="UNMISS" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>UNMISS</span>'" />
            <img src="{{ asset('partners/unicef.png') }}" alt="UNICEF" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>UNICEF</span>'" />
            <img src="{{ asset('partners/solidarityforafricanwomen.png') }}" alt="SOAWR" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>SOAWR</span>'" />
            <img src="{{ asset('partners/sswomencoalition.jpg') }}" alt="SS Women's Coalition" class="h-12 lg:h-16 object-contain opacity-80 hover:opacity-100 transition-opacity duration-300" onerror="this.outerHTML='<span class=\'text-gray-400 text-md font-semibold\'>SS Women\'s Coalition</span>'" />
          </div>
        </div>
      </div>

    </div>

    <!-- CSS for animations -->
    <style>
      @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
      }
      
      .animate-scroll-left {
        animation: scroll-left 30s linear infinite;
      }
      
      .animate-scroll-left:hover {
        animation-play-state: paused;
      }
    </style>
  </section>

  <!-- JOIN OUR MOVEMENT -->
  <section class="py-20 bg-gradient-to-br from-green-600 via-green-700 to-green-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-left text-white">
      <p class="text-green-200 font-semibold text-md uppercase tracking-wider mb-3">Take Action</p>
      <h2 class="text-4xl font-bold mb-4">Join Our Movement for Justice & Equality</h2>
      <p class="text-white/80 max-w-2xl mb-14">Together, we can create a just and equitable society where every woman and girl can thrive. Your support makes a difference.</p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 card-hover text-center">
          <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-3">Volunteer</h3>
          <p class="text-white/70 text-md mb-6">Join our team of dedicated volunteers and contribute your skills to our mission of advancing gender justice.</p>
          <a href="#contact" class="inline-block bg-white text-green-700 px-6 py-2 rounded-full text-md font-semibold hover:bg-gray-50 transition-all">Get Involved</a>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 card-hover text-center">
          <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
            <!-- add handshake svg -->
             <img src="{{ asset('hand-shake.png') }}" alt="Handshake" class="w-16 h-16">
          </div>
          <h3 class="text-xl font-bold mb-3">Partner</h3>
          <p class="text-white/60 text-md mb-6">Collaborate with us to amplify impact and create sustainable change across South Sudan's communities.</p>
          <a href="#contact" class="inline-block bg-white text-green-700 px-6 py-2 rounded-full text-md font-semibold hover:bg-gray-50 transition-all">Partner With Us</a>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 card-hover text-center">
          <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-3">Donate</h3>
          <p class="text-white/70 text-md mb-6">Support our programs and help us reach more women and girls in need across our five strategic priorities.</p>
          <a href="#contact" class="inline-block bg-white text-green-700 px-6 py-2 rounded-full text-md font-semibold hover:bg-gray-50 transition-all">Donate Now</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="py-20 bg-white">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-12">
      <div class="text-center mb-14">
        <p class="text-woje-green font-semibold text-base uppercase tracking-wider mb-2">Get In Touch</p>
        <h2 class="text-5xl font-bold text-gray-700 mb-3">Ready to Join Our Mission?</h2>
        <div class="section-divider mx-auto mb-4"></div>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">We'd love to hear from you and explore how we can work together.</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
        <!-- Info -->
        <div class="lg:col-span-2 space-y-6">
          <div>
            <h3 class="text-2xl font-bold text-gray-700 mb-5">WOJE Organization</h3>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-woje-green/10 rounded-xl flex items-center justify-center shrink-0">
              <svg class="w-6 h-6 text-woje-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
              <div class="font-semibold text-gray-700 text-base mb-1">Physical Address</div>
              <div class="text-gray-600 text-base leading-relaxed">Loriki Boma, Gudele North<br/>Mundri Road, Juba CES<br/>South Sudan</div>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-woje-green/10 rounded-xl flex items-center justify-center shrink-0">
              <svg class="w-6 h-6 text-woje-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <div>
              <div class="font-semibold text-gray-700 text-base mb-1">Phone Numbers</div>
              <a href="tel:+211924029327" class="text-gray-700 text-base font-medium hover:text-woje-orange block">+211 924 029 327</a>
              <a href="tel:+211929402770" class="text-gray-700 text-base font-medium hover:text-woje-orange block">+211 929 402 770</a>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-woje-green/10 rounded-xl flex items-center justify-center shrink-0">
              <svg class="w-6 h-6 text-woje-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
              <div class="font-semibold text-gray-700 text-base mb-1">Email Address</div>
              <a href="mailto:info@woje.org" class="text-blue-500 text-base font-medium hover:text-woje-orange">info@woje.org</a>
            </div>
          </div>

          <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
            <div class="font-bold text-red-700 text-base mb-2">🆘 Emergency GBV Support</div>
            <p class="text-red-600 text-md leading-relaxed mb-3">If you or someone you know needs immediate support for gender-based violence, please reach out to our confidential helpline.</p>
            <a href="tel:+211924029327" class="inline-block bg-red-600 text-white text-md px-5 py-3 rounded-full font-semibold hover:bg-red-700 transition-colors">Get Help Now</a>
          </div>
        </div>

        <!-- Form -->
        <div class="lg:col-span-3 rounded-3xl p-8 border border-gray-200 shadow-xl">
          <h3 class="text-2xl font-bold text-gray-700 mb-3">Send us a message</h3>
          <p class="text-gray-600 text-base mb-6">We'll get back to you as soon as possible.</p>

          <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
            @csrf
            @if($errors->any())
              <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                <div class="text-red-600 font-medium mb-2">Please fix the following errors:</div>
                <ul class="text-red-500 text-sm space-y-1">
                  @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-base font-semibold text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full border border-gray-200 rounded-xl px-5 py-4 text-base focus:outline-none focus:border-woje-red focus:ring-2 focus:ring-woje-red/20 transition-all bg-white shadow-sm @error('first_name') border-red-500 @enderror" placeholder="Jane" />
                @error('first_name')
                  <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label class="block text-base font-semibold text-gray-700 mb-2">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full border border-gray-200 rounded-xl px-5 py-4 text-base focus:outline-none focus:border-woje-red focus:ring-2 focus:ring-woje-red/20 transition-all bg-white shadow-sm @error('last_name') border-red-500 @enderror" placeholder="Doe" />
                @error('last_name')
                  <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div>
              <label class="block text-base font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
              <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-200 rounded-xl px-5 py-4 text-base focus:outline-none focus:border-woje-red focus:ring-2 focus:ring-woje-red/20 transition-all bg-white shadow-sm @error('email') border-red-500 @enderror" placeholder="jane@example.com" />
              @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <label class="block text-base font-semibold text-gray-700 mb-2">Subject <span class="text-red-500">*</span></label>
              <input type="text" name="subject" value="{{ old('subject') }}" required class="w-full border border-gray-200 rounded-xl px-5 py-4 text-base focus:outline-none focus:border-woje-red focus:ring-2 focus:ring-woje-red/20 transition-all bg-white shadow-sm @error('subject') border-red-500 @enderror" placeholder="How can we help?" />
              @error('subject')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <label class="block text-base font-semibold text-gray-700 mb-2">Message <span class="text-red-500">*</span></label>
              <textarea name="message" required rows="6" class="w-full border border-gray-200 rounded-xl px-5 py-4 text-base focus:outline-none focus:border-woje-red focus:ring-2 focus:ring-woje-red/20 transition-all bg-white shadow-sm resize-none @error('message') border-red-500 @enderror" placeholder="Your message here...">{{ old('message') }}</textarea>
              @error('message')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-woje-green to-woje-green-dark text-white py-4 rounded-xl font-bold text-lg hover:opacity-90 transition-all shadow-lg">
              Send Message
            </button>
                      </form>
        </div>
      </div>
    </div>
  </section>


@endsection