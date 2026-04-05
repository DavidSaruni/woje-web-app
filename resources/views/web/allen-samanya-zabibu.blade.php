@extends('web.app')

@section('title', 'Allen Samanya Zabibu – GBV Officer (Raja) | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .allen-profile-page { font-family: 'DM Sans', sans-serif; }
  .allen-profile-page h1, .allen-profile-page h2, .allen-profile-page h3 { font-family: 'Playfair Display', serif; }

  .allen-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .allen-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
</style>
@endpush

@section('content')
<div class="allen-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Allen Samanya Zabibu</span>
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
                GBV Officer — Raja
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Ms. Allen Samanya Zabibu
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                Over 13 years protecting and empowering women, children, and communities affected by gender-based
                violence—combining academic depth in social work with frontline humanitarian experience across South Sudan.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-green-600 text-green-700 text-sm font-medium px-3 py-1.5 rounded-full">
                B.A. Social Work &amp; Administration
              </span>
              <span class="border border-orange-600 text-orange-700 text-sm font-medium px-3 py-1.5 rounded-full">
                GBV · Child protection · Community care
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
                src="{{ asset('allen-samanya-zabibu.jpeg') }}"
                alt="Allen Samanya Zabibu – GBV Officer, WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/f97316/ffffff?text=Allen+Samanya+Zabibu'"
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
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Allen Samanya Zabibu</h2>
          <p class="text-xl text-gray-600">
            Community protection, GBV response, and social justice in South Sudan
          </p>
        </div>

        <div class="space-y-8 text-lg text-gray-700 leading-relaxed">
          <p>
            Allen Samanya Zabibu is a dedicated South Sudanese professional born on July 26, 1992, who has devoted
            over 13 years of her career to protecting and empowering vulnerable populations, particularly women and
            children affected by gender-based violence. Currently residing in Juba and serving as a GBV Officer in Raja,
            Allen brings a unique combination of academic excellence and practical field experience to her vital work
            in community protection and social justice.
          </p>
          <p>
            Her educational foundation is built upon a Bachelor's degree in Social Work and Administration, which
            provided her with the theoretical framework and practical skills necessary for effective community
            intervention and program management. This academic background has been instrumental in shaping her
            approach to addressing complex social issues and implementing evidence-based solutions in challenging
            environments.
          </p>
          <p>
            Allen's professional journey began in 2012 when she joined Plan International as a Child Protection
            Assistant, where she spent three formative years (2012–2015) developing her expertise in safeguarding
            vulnerable children and understanding the intricate dynamics of protection work in humanitarian settings.
            This early experience laid the groundwork for her specialized focus on gender-based violence prevention and
            response.
          </p>
          <p>
            In 2017, Allen expanded her expertise by taking on the role of Women Support Officer with Health Link South
            Sudan, where she implemented comprehensive GBV programs that integrated health services with protection
            interventions. This position allowed her to develop a holistic understanding of how gender-based violence
            intersects with health outcomes and community well-being, skills that continue to inform her current
            practice.
          </p>
          <p>
            Her commitment to professional development is evident in her extensive training portfolio, which includes
            specialized certifications in GBV concepts and guiding principles, Gender-Based Violence Information
            Management System (GBVIMS), comprehensive case management, Prevention of Sexual Exploitation and Abuse
            (PSEA), community care approaches, business management and bookkeeping, managing gender in emergencies,
            and engaging men through accountability practices. This diverse skill set enables her to approach
            gender-based violence from multiple angles and implement comprehensive, culturally sensitive interventions.
          </p>
          <p>
            In 2023, Allen took on the dual role of GBV Officer and Community Care Focal Person, where she demonstrated
            exceptional leadership in coordinating community-based protection mechanisms and building local capacity for
            sustainable violence prevention. Her current position as GBV Officer (2024–2025) represents the culmination
            of her professional growth and her ongoing commitment to creating safer communities for women and girls
            across South Sudan.
          </p>
          <p>
            Allen's professional competencies extend beyond direct service delivery to include training and capacity
            building, coordination and partnership development, and advocacy for women, peace, and security. She
            possesses a remarkable ability to communicate complex ideas in accessible ways tailored to different
            audiences, making her an effective trainer and facilitator. Her proven experience in building effective
            relationships and working in partnership with other NGOs has been crucial in creating collaborative
            approaches to addressing gender-based violence at the community level.
          </p>
          <p>
            As a practicing Muslim, Allen brings a deep understanding of cultural sensitivity and religious
            considerations to her work, enabling her to build trust and rapport with diverse communities while
            maintaining her unwavering commitment to promoting equality, safety, and dignity for all. Her personal
            values align seamlessly with WOJE's mission, making her an invaluable member of the team working toward
            gender justice and social transformation in South Sudan.
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
