@extends('web.app')

@section('title', 'Zabib Musa Loro – Executive Director | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .zabib-profile-page { font-family: 'DM Sans', sans-serif; }
  .zabib-profile-page h1, .zabib-profile-page h2, .zabib-profile-page h3 { font-family: 'Playfair Display', serif; }

  .zabib-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .zabib-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }

  .zabib-profile-page .gallery-scroll::-webkit-scrollbar { height: 4px; }
  .zabib-profile-page .gallery-scroll::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 2px; }
  .zabib-profile-page .gallery-scroll::-webkit-scrollbar-thumb { background: #ea580c; border-radius: 2px; }

  .zabib-profile-page .gallery-item img { transition: transform 0.3s ease; }
  .zabib-profile-page .gallery-item:hover img { transform: scale(1.05); }

  @keyframes zabibPulseDot {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.4; }
  }
  .zabib-profile-page .zabib-award-pulse { animation: zabibPulseDot 2s ease-in-out infinite; }
</style>
@endpush

@section('content')
<div class="zabib-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Zabib Musa Loro</span>
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
                Executive Director
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Zabib Musa Loro
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                Gender specialist, human rights defender, and transformational leader with over 10 years of
                experience advancing women's rights and gender equality across South Sudan and Eastern Africa.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-purple-600 text-purple-600 text-sm font-medium px-3 py-1.5 rounded-full">
                2025 US Women of Courage Award Winner
              </span>
              <span class="border border-yellow-600 text-yellow-600 text-sm font-medium px-3 py-1.5 rounded-full">
                2023 Outstanding Human Rights Defender
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
                View Publications
              </a>
            </div>
          </div>

          <div class="relative flex justify-center">
            <div class="absolute -top-8 -right-8 w-32 h-32 opacity-20 dot-grid-orange rounded-lg"></div>
            <div class="absolute -bottom-8 -left-8 w-24 h-24 opacity-20 dot-grid-green rounded-lg"></div>

            <div class="relative z-10 w-full max-w-md">
              <img
                src="{{ asset('zabibloro.jpeg') }}"
                alt="Zabib Musa Loro – Executive Director of WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/f97316/ffffff?text=Zabib+Musa+Loro'"
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
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Zabib Musa Loro</h2>
          <p class="text-xl text-gray-600">
            A visionary leader dedicated to advancing gender justice and human rights across South Sudan
          </p>
        </div>

        <div class="space-y-8 text-lg text-gray-700 leading-relaxed">
          <p>
            Zabib Musa Loro serves as the Executive Director of Women for Justice and Equality (WOJE), bringing over
            a decade of transformative leadership in gender programming, policy advocacy, and human rights defense.
            Her unwavering commitment to advancing women's rights has earned her international recognition,
            including the prestigious 2025 US International Women of Courage Award from the US State Department and
            the 2023 Outstanding Woman Human Rights Defender Award.
          </p>
          <p>
            As a gender specialist with comprehensive expertise spanning Sexual and Gender-Based Violence (SGBV)
            prevention and response, Sexual and Reproductive Health Rights (SRHR), women's economic empowerment, and
            human rights advocacy, Zabib has been instrumental in driving systemic change across South Sudan. Her
            leadership extends beyond WOJE, having previously served as Chairperson of the Eastern Africa National
            Networks of AIDS Service Organizations (EANNASO) and the Network of AIDS Service Organizations in South
            Sudan (NASOSS), where she coordinated regional and national HIV/AIDS response initiatives.
          </p>
          <p>
            Zabib's academic foundation includes a Bachelor's degree in Human Resource Management, complemented by
            specialized diplomas in Development Studies, Islamic Studies, Gender Studies, and Leadership. This
            diverse educational background, combined with her extensive field experience, has positioned her as a
            leading voice in the Maputo Protocol ratification advocacy, working tirelessly to ensure South Sudan's
            commitment to the Protocol to the African Charter on Human and Peoples' Rights on the Rights of Women in
            Africa.
          </p>
          <p>
            Under her visionary leadership, WOJE has evolved from a grassroots movement into a nationally recognized
            organization that has impacted over 110,000 lives through comprehensive programming in protection,
            health, peacebuilding, governance and justice, and economic empowerment. Her strategic approach to
            institutional development and her commitment to evidence-informed advocacy have strengthened WOJE's
            capacity to drive transformative change while building sustainable partnerships across civil society,
            government, and international development sectors.
          </p>
          <p>
            Beyond her organizational leadership, Zabib has served as Coordinator of the Civil Society Security
            Sector Reform Network, demonstrating her commitment to promoting accountability, transparency, and
            democratic governance. Her work in this capacity has contributed to strengthening civil society
            engagement in security sector reform initiatives, ensuring that women's voices and perspectives are
            central to peace and security discussions in South Sudan.
          </p>
          <p>
            Zabib's recognition as a 2025 US Women of Courage Award recipient underscores her exceptional courage
            and leadership in advancing women's rights and human rights in challenging circumstances. This
            international acknowledgment reflects not only her individual achievements but also the collective
            impact of WOJE's work under her guidance, as the organization continues to be a beacon of hope and
            transformation for women and girls across South Sudan.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section id="publications" class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Publications &amp; media</h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
          Statements, stories, and updates featuring WOJE’s advocacy and programs often appear in our news section.
          For speaking engagements, research collaboration, or media requests, please reach out via the contact options below.
        </p>
        <a href="{{ route('news') }}"
          class="inline-flex items-center justify-center gap-2 border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white font-semibold px-8 py-3 rounded-xl transition-colors">
          Browse WOJE news &amp; updates
        </a>
      </div>
    </div>
  </section>

  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-6xl mx-auto">

        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Photo gallery</h2>

        <div class="flex gap-4 overflow-x-auto pb-4 gallery-scroll">

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-courage-award-ceremony.jpeg') }}"
                   alt="Zabib Musa Loro at the 2025 US Women of Courage Award ceremony"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/f97316/ffffff?text=Award+Ceremony'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-portrait-professional.jpeg') }}"
                   alt="Professional portrait of Zabib Musa Loro"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/16a34a/ffffff?text=Professional+Portrait'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-state-dept-group.jpeg') }}"
                   alt="Zabib with fellow Women of Courage Award recipients at US State Department"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/f97316/ffffff?text=State+Dept+Group'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-meeting-1.jpeg') }}"
                   alt="Zabib in diplomatic meetings with international partners"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/16a34a/ffffff?text=Diplomatic+Meeting'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-government-building.jpeg') }}"
                   alt="Zabib and fellow advocates at US government building"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/f97316/ffffff?text=Government+Building'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-state-dept-large-group.jpeg') }}"
                   alt="Large group photo at US State Department ceremony"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/16a34a/ffffff?text=Large+Group'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-meeting-2.jpeg') }}"
                   alt="Zabib in follow-up diplomatic meetings"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/f97316/ffffff?text=Follow-up+Meeting'"/>
            </div>
          </div>

          <div class="flex-shrink-0 w-80 gallery-item cursor-pointer">
            <div class="aspect-video overflow-hidden rounded-xl shadow-lg">
              <img src="{{ asset('zabib-courage-award-ceremony-2.jpeg') }}"
                   alt="Another moment from the Women of Courage Award ceremony"
                   class="w-full h-full object-cover"
                   onerror="this.src='https://placehold.co/320x180/16a34a/ffffff?text=Award+Ceremony+2'"/>
            </div>
          </div>

        </div>

        <div class="text-center mt-12">
          <div class="inline-flex items-center gap-2 px-6 py-3 bg-orange-100 rounded-full">
            <div class="w-3 h-3 bg-orange-600 rounded-full zabib-award-pulse"></div>
            <span class="text-orange-800 font-medium">2025 US Women of Courage Award Recipient</span>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
@endsection
