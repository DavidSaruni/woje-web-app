@extends('web.app')

@section('title', 'About WOJE | Women for Justice & Equality')

@section('content')
<div class="min-h-screen bg-white">
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
          <div class="space-y-4">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">About Us</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
              Since 2016, WOJE has grown from a grassroots movement into a nationally recognized voice for feminist
              action and social justice in South Sudan. We are committed to advancing gender justice through
              transformative programming and evidence-informed advocacy.
            </p>
            <p class="text-lg text-gray-600 leading-relaxed">
              Our work spans five strategic priorities: Protection, Health, Peacebuilding, Governance &amp; Justice, and
              Economic Empowerment. Through these interconnected approaches, we've reached over 110,000 individuals
              with life-changing programs.
            </p>
          </div>

          <div class="grid grid-cols-2 gap-6">
            <div class="space-y-2">
              <div class="text-3xl font-bold text-orange-600">110K+</div>
              <div class="text-gray-600">Lives Impacted</div>
            </div>
            <div class="space-y-2">
              <div class="text-3xl font-bold text-green-600">9</div>
              <div class="text-gray-600">Years of Service</div>
            </div>
          </div>

          <a href="#mission-vision" class="inline-block bg-orange-600 hover:bg-orange-700 text-white text-lg px-8 py-3 rounded-md transition-colors">
            Learn More About Us
          </a>
        </div>

        <div class="relative">
          <div class="relative z-10">
            <img
              src="{{ asset('community-gathering.jpeg') }}"
              alt="WOJE community gathering"
              class="rounded-2xl shadow-2xl object-cover w-full"
              onerror="this.onerror=null;this.src='{{ asset('hero-image.jpg') }}';"
            />
          </div>
          <div class="absolute -top-8 -left-8 w-32 h-32 opacity-20">
            <div class="grid grid-cols-8 gap-2">
              @for ($i = 0; $i < 64; $i++)
                <div class="w-2 h-2 bg-orange-600 rounded-full"></div>
              @endfor
            </div>
          </div>
        </div>
      </div>

      <div id="mission-vision" class="mt-20">
        <div class="text-center mb-16">
          <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Our Mission &amp; Vision</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Guiding principles that drive our commitment to gender justice and equality across South Sudan
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
          <div class="relative group">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-orange-600 rounded-3xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300"></div>
            <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-orange-100 transition-all duration-300">
              <div class="flex items-center justify-center w-16 h-16 bg-orange-100 rounded-2xl mb-6 group-hover:bg-orange-200 transition-colors">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="9" stroke-width="2"></circle>
                  <circle cx="12" cy="12" r="6" stroke-width="2"></circle>
                  <circle cx="12" cy="12" r="3" stroke-width="2"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l10 10"></path>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h3>
              <p class="text-gray-600 leading-relaxed text-lg">
                To promote social justice, gender equality, and youth empowerment by advancing inclusive
                access to rights, resources, and leadership opportunities in fragile and underserved
                communities.
              </p>
              <div class="mt-6 flex items-center text-orange-600 font-semibold">
                <span>Driving Change</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </div>
            </div>
          </div>

          <div class="relative group">
            <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl transform -rotate-3 group-hover:-rotate-6 transition-transform duration-300"></div>
            <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-green-100 transition-all duration-300">
              <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-2xl mb-6 group-hover:bg-green-200 transition-colors">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h3>
              <p class="text-gray-600 leading-relaxed text-lg">
                A just, inclusive, and empowered society where women and youth live in dignity, freedom,
                and equal opportunity.
              </p>
              <div class="mt-6 flex items-center text-green-600 font-semibold">
                <span>Creating Impact</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-20 text-center">
          <h3 class="text-3xl font-bold text-gray-900 mb-12">Our Core Values</h3>
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition-colors">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 12.5l1.8 1.8 3.2-3.2"></path>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Integrity</h4>
              <p class="text-gray-600 text-sm">We uphold highest standards of honesty, transparency, and accountability in all our actions and decisions</p>
            </div>

            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-purple-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-purple-200 transition-colors">
                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7V5a3 3 0 016 0v2"></path>
                  <rect x="5" y="7" width="14" height="12" rx="2" ry="2" stroke-width="2"></rect>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11h6M9 14h6"></path>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Professionalism</h4>
              <p class="text-gray-600 text-sm">We are committed to excellence, competence, and ethical conduct in our programs and partnerships</p>
            </div>

            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-green-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-green-200 transition-colors">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="8" r="2.5" stroke-width="2"></circle>
                  <circle cx="6.5" cy="10" r="2" stroke-width="2"></circle>
                  <circle cx="17.5" cy="10" r="2" stroke-width="2"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18a3.5 3.5 0 017 0M13 18a3.5 3.5 0 017 0M8 19a4.5 4.5 0 019 0"></path>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Teamwork</h4>
              <p class="text-gray-600 text-sm">We foster a collaborative culture that values unique contributions of every individual and organization</p>
            </div>

            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-orange-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-orange-200 transition-colors">
                <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9h12M6 15h12"></path>
                  <circle cx="4" cy="9" r="1.5" stroke-width="2"></circle>
                  <circle cx="20" cy="9" r="1.5" stroke-width="2"></circle>
                  <circle cx="4" cy="15" r="1.5" stroke-width="2"></circle>
                  <circle cx="20" cy="15" r="1.5" stroke-width="2"></circle>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Equality</h4>
              <p class="text-gray-600 text-sm">We believe in inherent rights of all people to equal opportunities and treatment, regardless of background</p>
            </div>

            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-red-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-red-200 transition-colors">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v3m0 0h6m-6 0H6"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10l-2 5h4l-2-5zm10 0l-2 5h4l-2-5z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16"></path>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Equity</h4>
              <p class="text-gray-600 text-sm">We actively work to eliminate systemic barriers and ensure fair access to resources and support for marginalized communities</p>
            </div>

            <div class="text-center group">
              <div class="w-20 h-20 mx-auto bg-yellow-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-yellow-200 transition-colors">
                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20s-6-3.8-6-8.2A3.8 3.8 0 0112 8.7a3.8 3.8 0 016 3.1C18 16.2 12 20 12 20z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14.5c1.2-1.2 2.8-1.2 4 0M10 12.5h.01M14 12.5h.01"></path>
                </svg>
              </div>
              <h4 class="font-semibold text-gray-900 mb-2">Respect</h4>
              <p class="text-gray-600 text-sm">We honor dignity, voices, and experiences of all individuals with mutual respect and empathy</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
