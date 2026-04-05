@extends('web.app')

@section('title', 'Hamida Khamisa – Finance & Operations Manager | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .hamida-profile-page { font-family: 'DM Sans', sans-serif; }
  .hamida-profile-page h1, .hamida-profile-page h2, .hamida-profile-page h3 { font-family: 'Playfair Display', serif; }

  .hamida-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .hamida-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
</style>
@endpush

@section('content')
<div class="hamida-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Hamida Khamisa</span>
      </div>
    </div>
  </section>

  <section class="py-20 bg-gradient-to-br from-orange-50 to-green-50 relative overflow-hidden">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

          <div class="space-y-8">
            <div class="space-y-4">
              <span class="inline-block bg-orange-600 text-white text-lg font-semibold px-4 py-2 rounded-full">
                Finance &amp; Operations Manager
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Ms. Hamida Khamisa
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                A dedicated finance professional committed to operational excellence in humanitarian work—bringing
                psychology-informed leadership to budgets, logistics, and donor-compliant delivery at WOJE.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-green-600 text-green-700 text-sm font-medium px-3 py-1.5 rounded-full">
                Financial Management
              </span>
              <span class="border border-orange-600 text-orange-700 text-sm font-medium px-3 py-1.5 rounded-full">
                5+ years humanitarian sector
              </span>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
              <a href="#contact"
                class="inline-flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-lg font-semibold px-8 py-3 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Get in Touch
              </a>
              <a href="#publications"
                class="inline-flex items-center justify-center gap-2 border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white bg-transparent text-lg font-semibold px-8 py-3 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                News &amp; updates
              </a>
            </div>
          </div>

          <div class="relative flex justify-center">
            <div class="absolute -top-8 -right-8 w-32 h-32 opacity-20 dot-grid-orange rounded-lg"></div>
            <div class="absolute -bottom-8 -left-8 w-24 h-24 opacity-20 dot-grid-green rounded-lg"></div>

            <div class="relative z-10 w-full max-w-md">
              <img
                src="{{ asset('hamida-khamisa.jpg') }}"
                alt="Hamida Khamisa – Finance &amp; Operations Manager, WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/f97316/ffffff?text=Hamida+Khamisa'"
              />
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-4xl mx-auto">

        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Hamida Khamisa</h2>
          <p class="text-xl text-gray-600">
            A dedicated finance professional committed to operational excellence in humanitarian work
          </p>
        </div>

        <div class="space-y-8 text-lg text-gray-700 leading-relaxed">
          <p>
            Hamida Khamisa is a seasoned finance professional with a unique multidisciplinary background. She holds a
            bachelor's degree in Psychology, complemented by diplomas in finance, logistics, project management, and
            evaluation. With over five years of dedicated service in the humanitarian sector, Hamida has developed a
            robust skill set in case management, data collection, and financial oversight tailored to complex
            operational environments.
          </p>
          <p>
            Her expertise spans financial planning, budgeting, and logistical coordination within humanitarian
            projects, ensuring optimal resource allocation and compliance with donor requirements. Hamida's grounding
            in psychology enhances her approach to team leadership and stakeholder engagement, fostering collaborative
            environments that drive efficiency and program success.
          </p>
          <p>
            Experienced in project management and evaluation, she brings a strategic mindset to financial
            decision-making, combining analytical rigor with practical problem-solving. As a Finance &amp; Operations
            Manager, Hamida excels in overseeing financial operations, managing budgets, and supporting programmatic
            goals through sound fiscal management.
          </p>
          <p>
            Hamida's comprehensive understanding of both financial systems and humanitarian operations enables her to
            bridge the gap between program implementation and financial accountability. Her ability to develop and
            implement efficient financial systems has been instrumental in enhancing organizational capacity and ensuring
            the effective delivery of services to communities in need.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section id="publications" class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">News &amp; media</h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
          Follow WOJE's statements, programs, and organizational updates in our news section.
        </p>
        <a href="{{ route('news') }}"
          class="inline-flex items-center justify-center gap-2 border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white font-semibold px-8 py-3 rounded-xl transition-colors">
          Browse WOJE news &amp; updates
        </a>
      </div>
    </div>
  </section>

</div>
@endsection
