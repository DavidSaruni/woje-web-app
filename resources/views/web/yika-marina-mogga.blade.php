@extends('web.app')

@section('title', 'Yika Marina Mogga – Program Manager | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .yika-profile-page { font-family: 'DM Sans', sans-serif; }
  .yika-profile-page h1, .yika-profile-page h2, .yika-profile-page h3 { font-family: 'Playfair Display', serif; }

  .yika-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .yika-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
</style>
@endpush

@section('content')
<div class="yika-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Yika Marina Mogga</span>
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
                Program Manager
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Ms. Yika Marina Mogga
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                A strategic program management leader committed to creating meaningful, lasting impact through
                transformative initiatives across South Sudan.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-green-600 text-green-700 text-sm font-medium px-3 py-1.5 rounded-full">
                B.A. Business Administration · Leadership &amp; Development Studies
              </span>
              <span class="border border-orange-600 text-orange-700 text-sm font-medium px-3 py-1.5 rounded-full">
                Peace · GBV · Health · Education
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
                src="{{ asset('yika-marina-mogga.jpeg') }}"
                alt="Yika Marina Mogga – Program Manager, WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/16a34a/ffffff?text=Yika+Marina+Mogga'"
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
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Yika Marina Mogga</h2>
          <p class="text-xl text-gray-600">
            A strategic program management leader committed to creating meaningful, lasting impact through transformative initiatives
          </p>
        </div>

        <div class="space-y-8 text-lg text-gray-700 leading-relaxed">
          <p>
            With over four years of professional experience, Yika Marina Mogga is dedicated to advancing gender equality,
            promoting social justice, and empowering women through transformative programs. Currently serving as Program
            Manager at Women for Justice and Equality (WOJE), she provides strategic leadership in the design,
            implementation, and evaluation of initiatives that create meaningful, lasting impact across South Sudan's
            communities.
          </p>
          <p>
            Yika's career has focused on managing projects in peacebuilding, gender-based violence (GBV) prevention and
            response, health, and education. Through this comprehensive work, she has gained extensive experience in
            developing and coordinating programs that address systemic barriers, strengthen communities, and ensure that
            women's voices are at the center of decision-making processes. Her approach emphasizes evidence-based
            interventions that are both strategic and results-oriented.
          </p>
          <p>
            She holds a Bachelor's degree in Business Administration and a Diploma in Leadership and Development
            Studies, which have equipped her with strong organizational, analytical, and leadership skills. These
            academic foundations complement her extensive field experience, enabling her to design and manage programs
            that effectively bridge theory and practice while delivering measurable outcomes for the communities WOJE
            serves.
          </p>
          <p>
            In her role at WOJE, Yika collaborates closely with local communities, government institutions, and
            international partners to design evidence-based interventions that are inclusive, sustainable, and responsive
            to real needs. Her approach is grounded in integrity, accountability, and a strong belief that progress is only
            possible when all individuals are given equal opportunity to thrive. She ensures that program design and
            implementation processes are participatory and community-driven.
          </p>
          <p>
            Beyond program management, Yika is passionate about creating safe spaces for dialogue, fostering community
            resilience, and promoting women's leadership in every sector of society. She believes in empowering women
            not only as beneficiaries but as agents of change who can shape policies, institutions, and futures. Her work
            consistently demonstrates a commitment to building local capacity and ensuring sustainable impact beyond
            project timelines.
          </p>
          <p>
            Looking ahead, Yika's goal is to continue building impactful programs that expand access to justice, strengthen
            equality, and contribute to a more peaceful and inclusive world. Her vision encompasses scaling successful
            interventions while continuously innovating to address emerging challenges facing women and girls in South
            Sudan and the broader region.
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
