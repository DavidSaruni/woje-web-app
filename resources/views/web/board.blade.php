@extends('web.app')

@section('title', 'Board Of Directors')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

<style>
  body, * { font-family: 'Inter', sans-serif !important; }

  .team-card {
    transition: box-shadow 0.25s ease, transform 0.25s ease;
    border: 1px solid #e2e8f0;
  }
  .team-card:hover {
    box-shadow: 0 6px 24px rgba(30,58,110,0.12);
    transform: translateY(-2px);
  }

  /* ── Left identity panel ── */
  .member-identity {
    background-color: #1e3a6e;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    padding: 0;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
  }

  .member-identity img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top;
    display: block;
  }

  /* Caption bar sits over/below the photo */
  .member-caption {
    background-color: #e86a10;
    width: 100%;
    padding: 12px 16px 14px;
    flex-shrink: 0;
  }
  .member-caption .member-name {
    font-weight: 700;
    font-size: 0.9rem;
    color: #ffffff;
    line-height: 1.35;
    margin: 0 0 3px;
  }
  .member-caption .member-title {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.80);
    margin: 0;
    font-style: italic;
  }

  /* ── Right bio panel ── */
  .member-bio {
    padding: 20px 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-left: 4px solid #e86a10;
  }

  .member-role-badge {
    font-size: 0.6rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #28a745;
    margin-bottom: 10px;
  }

  .member-bio-text {
    font-size: 0.82rem;
    color: #374151;
    line-height: 1.75;
    margin: 0;
  }

  /* Fallback avatar */
  .avatar-fallback {
    width: 100%;
    height: 100%;
    background: #2a4a80;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

{{-- ── Page Header ── --}}
<div class="mt-6 bg-[#28a745] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Our Team</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Board of Directors & Management</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

    {{-- Intro --}}
    <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
      <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#e86a10] mb-2">Governance & Leadership</p>
      <h2 class="text-xl font-bold text-[#28a745] mb-3">Leadership &amp; Oversight</h2>
      <p class="text-sm text-[#4b5563] leading-relaxed max-w-3xl">
        WOJE is guided by a board of committed leaders and a dedicated management team working together to advance gender justice, women's rights, and inclusive community development across South Sudan. Their combined expertise in governance, health, finance, and social justice steers WOJE's strategic vision and day-to-day operations.
      </p>
    </div>

    {{-- ── BOARD OF DIRECTORS ── --}}
    <div>
      <div class="bg-[#28a745] rounded-t px-6 py-4 border-b-4 border-[#e86a10]">
        <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Board of Directors</h2>
      </div>
      <div class="grid grid-cols-1 gap-5 pt-6">
        @foreach([
          ['Chairperson',                    'Ms. Joyce Ayoub Phillip Gaza',  'Chairperson, Board of Directors',        'Joyce Ayoub Phillip Gaza brings exceptional leadership and strategic vision to her role as Chairperson of WOJE\'s Board of Directors. With her extensive experience in governance and deep commitment to women\'s rights, she guides the organization\'s strategic direction and ensures accountability in all operations. As Chairperson, Joyce oversees the board\'s governance responsibilities, ensuring that WOJE maintains the highest standards of transparency, effectiveness, and impact in its mission to advance gender justice across South Sudan. Her leadership is instrumental in shaping the organization\'s policies and strategic initiatives.',                                                                                         'joyce-gaza-chairperson.jpeg'],
          ['Vice Chairperson',               'Ms. Catherine Visensio Lolika', 'Vice Chairperson, Board of Directors',   'Supports the board\'s strategic oversight and organisational accountability. Committed to advancing inclusive policies that promote gender equality and protect the rights of women and girls in South Sudan.',                                                                                  'catherine-visensio-lolika.jpg'],
          ['Board Treasurer',                'Ms. Mariam Hamida',             'Board Treasurer',                        'Provides financial oversight and ensures WOJE\'s resources are managed with integrity and transparency. Brings expertise in financial governance and organisational sustainability.',                                                                                                          'mariam-hamida.jpeg'],
          ['Board Secretary',                'Ms. Zabib Musa Loro',          'Board Secretary',   'Zabib Musa Loro serves as the Executive Director of Women for Justice and Equality (WOJE), bringing over a decade of transformative leadership in gender programming, policy advocacy, and human rights defense. Her unwavering commitment to advancing women\'s rights has earned her international recognition, including the prestigious 2025 US International Women of Courage Award from the US State Department and the 2023 Outstanding Woman Human Rights Defender Award.',                                                                                                          'zabibloro.jpeg'],
          ['Board Member',                      'Ms. Jennifer John Malachi',            'Board Member',                        'Jennifer John Malachi is a passionate and purpose-driven South Sudanese student, currently pursuing a Bachelor of Science in Data Science and Analytics at the United States International University-Africa (USIU-Africa). As a Mastercard Foundation Scholar and an active member of Cohort 6, Jennifer is deeply committed to using her education, skills, and voice to uplift communities and advocate for the rights and empowerment of women and girls in South Sudan.',                                                                                                          'jennifer.jpeg'],
        ] as [$role, $name, $credentials, $bio, $image])
        <div class="team-card bg-white rounded overflow-hidden flex flex-col sm:flex-row">

          {{-- Photo + Caption --}}
          <div class="flex flex-col sm:w-56 w-full flex-shrink-0">
            <div class="w-full" style="height:200px; overflow:hidden; background:#2a4a80;">
              <img
                src="{{ asset($image) }}"
                alt="{{ $name }}"
                style="width:100%;height:100%;object-fit:cover;object-position:top;display:block;"
                onerror="this.parentElement.innerHTML='<div class=\'avatar-fallback\'><svg xmlns=\'http://www.w3.org/2000/svg\' width=\'48\' height=\'48\' fill=\'#7eb8d4\' viewBox=\'0 0 16 16\'><path d=\'M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z\'/></svg></div>'"
              />
            </div>
            <div class="member-caption">
              <p class="member-name">{{ $name }}</p>
              <p class="member-title">{{ $credentials }}</p>
            </div>
          </div>

          {{-- Bio --}}
          <div class="member-bio flex-1">
            <p class="member-role-badge">{{ $role }}</p>
            <p class="member-bio-text">{{ $bio }}</p>
          </div>

        </div>
        @endforeach
      </div>
    </div>

    {{-- ── MANAGEMENT TEAM ── --}}
    <div>
      <div class="bg-[#28a745] rounded-t px-6 py-4 border-b-4 border-[#e86a10]">
        <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Management Team</h2>
      </div>
      <div class="grid grid-cols-1 gap-5 pt-6">
        @foreach([
          [
            'Executive Director',
            'Ms. Zabib Musa Loro',
            'Executive Director',             
            'Zabib Musa Loro serves as the Executive Director of Women for Justice and Equality (WOJE), bringing over a decade of transformative leadership in gender programming, policy advocacy, and human rights defense. Her unwavering commitment to advancing women\'s rights has earned her international recognition, including the prestigious 2025 US International Women of Courage Award from the US State Department and the 2023 Outstanding Woman Human Rights Defender Award.',                                                                                                                                                  
            'zabibloro.jpeg'
          ],
          [
            'Program Manager',
            'Ms. Yika Marina Mogga',    
            'Program Manager',                
            'With over four years of professional experience, Yika Marina Mogga is dedicated to advancing gender equality, promoting social justice, and empowering women through transformative programs. Currently serving as Program Manager at Women for Justice and Equality (WOJE), she provides strategic leadership in the design, implementation, and evaluation of initiatives that create meaningful, lasting impact across South Sudan\'s communities.',                                                                                                                     
            'yika-marina-mogga.jpeg'
          ],
          [
            'Finance & Operations',
            'Ms. Hamida Khamisa',       
            'Finance & Operations Manager',   
            'Hamida Khamisa is a seasoned finance professional with a unique multidisciplinary background. She holds a bachelor\'s degree in Psychology, complemented by diplomas in finance, logistics, project management, and evaluation. With over five years of dedicated service in the humanitarian sector, Hamida has developed a robust skill set in case management, data collection, and financial oversight tailored to complex operational environments. Her expertise spans financial planning, budgeting, and logistical coordination within humanitarian projects, ensuring optimal resource allocation and compliance with donor requirements. Hamida\'s grounding in psychology enhances her approach to team leadership and stakeholder engagement, fostering collaborative environments that drive efficiency and program success.',                                                                                                      
            'hamida-khamisa.jpg'
          ],
          [
            'M&E Officer',
            'Mr. Sebit Abdulkarim',     
            'Monitoring & Evaluation Officer',
            'Sebit Abdulkarim is a graduate of Makerere University Business School (Kampala), holding a bachelor\'s degree in Business Administration. He earned a certificate in Leadership Skills from Salemi School of Leadership (Nigeria) and a diploma in Advanced ICT from Nakawa Vocational Institute, Kampala, Uganda.Sebit\'s diverse skill set includes Monitoring and Evaluation, Communication, Graphic Design, Website and Social Media Management, and Content Creation. His professional journey includes three years as an Assistant Administrator at Sanyu FM Kampala, where his exceptional performance earned him the Administration Star of the Year award in 2021. During this time, he also gained valuable experience in audio advertising and program directing.',                                                                                                       
            'sebit-abdulkarim.jpg'
          ],
          [
            'GBV Officer – Raja',
            'Ms. Allen Samanya Zabibu',
            'GBV Officer',
            'Allen Samanya Zabibu is a dedicated South Sudanese professional born on July 26, 1992, who has devoted over 13 years of her career to protecting and empowering vulnerable populations, particularly women and children affected by gender-based violence. Currently residing in Juba and serving as a GBV Officer in Raja, Allen brings a unique combination of academic excellence and practical field experience to her vital work in community protection and social justice.',
            'allen-samanya-zabibu.jpeg'
          ],
          [
            'GBV Officer',         
            'Ms. Anna Joggo Ruman',     
            'GBV Officer',                    
            'Supports survivors of gender-based violence through counseling, legal assistance, and community outreach. Works closely with local authorities to ensure protection and justice for vulnerable women and girls.',                                                                       
            'anna-joggo-ruman.jpg'
          ],
        ] as [$role, $name, $credentials, $bio, $image])
        <div class="team-card bg-white rounded overflow-hidden flex flex-col sm:flex-row">

          {{-- Photo + Caption --}}
          <div class="flex flex-col sm:w-56 w-full flex-shrink-0">
            <div class="w-full" style="height:200px; overflow:hidden; background:#2a4a80;">
              <img
                src="{{ asset($image) }}"
                alt="{{ $name }}"
                style="width:100%;height:100%;object-fit:cover;object-position:top;display:block;"
                onerror="this.parentElement.innerHTML='<div class=\'avatar-fallback\'><svg xmlns=\'http://www.w3.org/2000/svg\' width=\'48\' height=\'48\' fill=\'#7eb8d4\' viewBox=\'0 0 16 16\'><path d=\'M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z\'/></svg></div>'"
              />
            </div>
            <div class="member-caption">
              <p class="member-name">{{ $name }}</p>
              <p class="member-title">{{ $credentials }}</p>
            </div>
          </div>

          {{-- Bio --}}
          <div class="member-bio flex-1">
            <p class="member-role-badge">{{ $role }}</p>
            <p class="member-bio-text">{{ $bio }}</p>
          </div>

        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

@endsection