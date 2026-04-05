@extends('web.app')

@section('title', 'Jennifer John Malachi – Board Member | WOJE')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  .jennifer-profile-page { font-family: 'DM Sans', sans-serif; }
  .jennifer-profile-page h1, .jennifer-profile-page h2, .jennifer-profile-page h3 { font-family: 'Playfair Display', serif; }

  .jennifer-profile-page .dot-grid-orange {
    background-image: radial-gradient(circle, #ea580c 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
  .jennifer-profile-page .dot-grid-green {
    background-image: radial-gradient(circle, #16a34a 1.5px, transparent 1.5px);
    background-size: 10px 10px;
  }
</style>
@endpush

@section('content')
<div class="jennifer-profile-page min-h-screen bg-white">

  <section class="py-4 bg-gray-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('web.index') }}" class="hover:text-orange-600 transition-colors">Home</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('board') }}" class="hover:text-orange-600 transition-colors">Leadership</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900 font-medium">Jennifer John Malachi</span>
      </div>
    </div>
  </section>

  <section class="py-20 bg-gradient-to-br from-orange-50 to-green-50 relative overflow-hidden">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

        <div class="relative flex justify-center">
            <div class="absolute -top-8 -right-8 w-32 h-32 opacity-20 dot-grid-orange rounded-lg"></div>
            <div class="absolute -bottom-8 -left-8 w-24 h-24 opacity-20 dot-grid-green rounded-lg"></div>

            <div class="relative z-10 w-full max-w-md">
              <img
                src="{{ asset('jennifer.jpeg') }}"
                alt="Jennifer John Malachi – Board Member, WOJE"
                class="rounded-2xl shadow-2xl object-cover w-full"
                onerror="this.src='https://placehold.co/400x500/f97316/ffffff?text=Jennifer+John+Malachi'"
              />
            </div>
          </div>  
        <div class="space-y-8">
            <div class="space-y-4">
              <span class="inline-block bg-orange-600 text-white text-lg font-semibold px-4 py-2 rounded-full">
                Board Member
              </span>
              <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Ms. Jennifer John Malachi
              </h1>
              <p class="text-xl text-gray-600 leading-relaxed">
                Data science scholar, Mastercard Foundation Scholar, and advocate for women and girls—using evidence
                and storytelling to strengthen communities in South Sudan.
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <span class="border border-green-600 text-green-700 text-sm font-medium px-3 py-1.5 rounded-full">
                USIU-Africa · Data Science &amp; Analytics
              </span>
              <span class="border border-orange-600 text-orange-700 text-sm font-medium px-3 py-1.5 rounded-full">
                Mastercard Foundation Scholar · Cohort 6
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

          

        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-6">
      <div class="max-w-4xl mx-auto">

        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-gray-900 mb-4">About Jennifer John Malachi</h2>
          <p class="text-xl text-gray-600">
            Board Member, Women for Justice and Equality (WOJE)
          </p>
        </div>

        <div class="text-lg text-gray-700 leading-relaxed space-y-6">

          <p>
            Jennifer John Malachi is a passionate and purpose-driven South Sudanese student, currently pursuing a
            Bachelor of Science in Data Science and Analytics at the United States International University-Africa
            (USIU-Africa). As a Mastercard Foundation Scholar and an active member of Cohort 6, Jennifer is deeply
            committed to using her education, skills, and voice to uplift communities and advocate for the rights and
            empowerment of women and girls in South Sudan.
          </p>

          <p>
            Born and raised in South Sudan, Jennifer witnessed both the resilience and the struggles of her people,
            particularly women and girls who faced limited access to education, health services, and economic
            opportunities. These early experiences ignited in her a deep sense of purpose and a desire to be part of the
            solution. From a young age, she demonstrated curiosity, determination, and a heart for service, qualities
            that would later shape her academic and professional aspirations.
          </p>

          <p>
            Jennifer has pursued her education with discipline and focus. Her academic journey led her to USIU-Africa,
            where she is currently studying Data Science and Analytics, a field she believes holds the key to
            evidence-based decision-making and sustainable development. Through her coursework, she has developed skills
            in data analysis, research, and monitoring and evaluation, which she applies to community development
            initiatives. Her participation in the Mastercard Foundation Scholars Program has further enriched her
            leadership capabilities and exposed her to a network of change-makers across the continent.
          </p>

          <p>
            Jennifer is not just a student; she is an active agent of change. In December 2025, she was part of a
            dedicated team of Mastercard Foundation Scholars that implemented a transformative Community Action Project
            in Kabu South and Luriki, in partnership with Women for Justice and Equality (WOJE). The project trained
            women and girls in leadership, Sexual and Reproductive Health and Rights (SRHR), and sustainable skills,
            such as paper bead-making and the production of reusable sanitary pads. Jennifer played a key role in
            monitoring, evaluation, and digital storytelling, ensuring that the project's impact was documented and
            amplified.
          </p>
          <p>
            Beyond this project, Jennifer is passionate about gender equality, youth empowerment, and using data to tell
            stories that drive change. She actively participates in discussions and initiatives that promote the rights
            and well-being of women and girls in South Sudan and beyond.
          </p>

          <p>
            Jennifer is guided by a strong moral and spiritual foundation. She values integrity, empathy, and
            collaboration. In her free time, she enjoys connecting with fellow young people, engaging in mentorship
            conversations, and exploring creative ways to advocate for social justice. Her faith remains a cornerstone
            of her life, shaping her vision and sustaining her through challenges.
          </p>

          <p>
            Jennifer John Malachi envisions a South Sudan where every girl has access to education, every woman has a
            voice, and data is used to build a more just and equitable society. She aspires to work at the intersection
            of data science and community development, using her skills to inform policy, improve programs, and amplify
            the voices of the marginalized. Ultimately, she hopes to inspire other young South Sudanese, especially
            girls, to pursue their dreams and become leaders in their own communities.
          </p>

          <p>
            Jennifer John Malachi embodies the spirit of resilience, service, and academic excellence. Through her
            dedication to learning, her hands-on community involvement, and her unwavering belief in the power of women
            and girls, she is steadily building a legacy of impact. She represents a new generation of South Sudanese
            leaders—rooted in faith, driven by purpose, and committed to transforming lives.
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
