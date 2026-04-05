@extends('web.app')

@section('title', 'Sebit Abdulkarim – Monitoring & Evaluation Officer | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .sebit-profile-page { font-family: 'DM Sans', sans-serif; }
  .sebit-profile-page h1, .sebit-profile-page h2, .sebit-profile-page h3 { font-family: 'Playfair Display', serif; }

  .sebit-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .sebit-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
</style>
@endpush

@section('content')
<div class="sebit-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Sebit Abdulkarim</span>
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
                Monitoring &amp; Evaluation Officer
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Mr. Sebit Abdulkarim
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                A versatile professional blending technical expertise with creative communication—linking M&amp;E,
                advocacy, and digital storytelling to strengthen program impact at WOJE.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-green-600 text-green-700 text-sm font-medium px-3 py-1.5 rounded-full">
                MUBS · Business Administration
              </span>
              <span class="border border-orange-600 text-orange-700 text-sm font-medium px-3 py-1.5 rounded-full">
                M&amp;E · Comms · Design · Digital media
              </span>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
              <a href="#publications"
                class="inline-flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white text-lg font-semibold px-8 py-3 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                News &amp; updates
              </a>
              <a href="{{ route('board') }}"
                class="inline-flex items-center justify-center gap-2 border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white bg-transparent text-lg font-semibold px-8 py-3 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Our team
              </a>
            </div>
          </div>

          <div class="relative flex justify-center">
            <div class="absolute -top-8 -right-8 w-32 h-32 opacity-20 dot-grid-orange rounded-lg"></div>
            <div class="absolute -bottom-8 -left-8 w-24 h-24 opacity-20 dot-grid-green rounded-lg"></div>

            <div class="relative z-10 w-full max-w-md">
              <img
                src="{{ asset('sebit-abdulkarim.jpg') }}"
                alt="Sebit Abdulkarim – Monitoring &amp; Evaluation Officer, WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/16a34a/ffffff?text=Sebit+Abdulkarim'"
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
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Sebit Abdulkarim</h2>
          <p class="text-xl text-gray-600">
            A versatile professional blending technical expertise with creative communication
          </p>
        </div>

        <div class="space-y-8 text-lg text-gray-700 leading-relaxed">
          <p>
            Sebit Abdulkarim is a graduate of Makerere University Business School (Kampala), holding a bachelor's
            degree in Business Administration. He earned a certificate in Leadership Skills from Salemi School of
            Leadership (Nigeria) and a diploma in Advanced ICT from Nakawa Vocational Institute, Kampala, Uganda.
          </p>
          <p>
            Sebit's diverse skill set includes Monitoring and Evaluation, Communication, Graphic Design, Website and
            Social Media Management, and Content Creation. His professional journey includes three years as an
            Assistant Administrator at Sanyu FM Kampala, where his exceptional performance earned him the
            Administration Star of the Year award in 2021. During this time, he also gained valuable experience in
            audio advertising and program directing.
          </p>
          <p>
            His career progressed to the Network of AIDS and Health Service Organizations of South Sudan (NASOSS),
            where he served as Communications and Advocacy Officer. In this role, Sebit worked closely with the
            Executive Director, expanding his management expertise and contributing to the organization's mission
            until January 2023.
          </p>
          <p>
            Since April 2023, Sebit has been an integral part of Women for Justice and Equality South Sudan, initially
            joining as Team Leader of Communications and Advocacy, while also providing support to the Monitoring and
            Evaluation team. His dual focus on communications and M&amp;E has enabled him to develop a unique
            perspective on program effectiveness and impact measurement.
          </p>
          <p>
            With a proactive mindset and commitment to continuous learning, Sebit brings a dynamic blend of analytical
            and creative skills to his role, consistently seeking innovative ways to enhance program delivery and
            organizational impact.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section id="publications" class="py-16 bg-gray-50 border-t border-gray-100">
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
