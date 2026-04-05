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

  .member-bio--with-profile {
    padding-bottom: 52px;
  }

  .member-profile-btn {
    position: absolute;
    bottom: 16px;
    right: 20px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 8px 14px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    text-decoration: none;
    color: #fff;
    background-color: #e86a10;
    border-radius: 6px;
    border: 1px solid #d45f0c;
    transition: background-color 0.2s ease, transform 0.2s ease;
  }
  .member-profile-btn:hover {
    background-color: #cf5f0e;
    color: #fff;
    transform: translateY(-1px);
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
      <span class="text-[#b3e8f5]">Leadership</span>
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

    {{-- ── BOARD ADVISORS ── --}}
    <div>
      <div class="bg-[#28a745] rounded-t px-6 py-4 border-b-4 border-[#e86a10]">
        <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Board Advisors</h2>
      </div>
      <div class="grid grid-cols-1 gap-5 pt-6">
        @foreach([
          ['Board Advisor',                    'Ms. Joyce Ayoub Phillip Gaza',  'Board Advisor',        'Joyce Ayoub Phillip Gaza brings exceptional leadership and strategic vision to her role as WOJE\'s Board Advisor. With her extensive experience in governance and deep commitment to women\'s rights, she guides the organization\'s strategic direction and ensures accountability in all operations. As Board Advisor, she contributes to the board\'s governance responsibilities, helping ensure that WOJE maintains the highest standards of transparency, effectiveness, and impact in its mission to advance gender justice across South Sudan. Her leadership is instrumental in shaping the organization\'s policies and strategic initiatives.',                                                                                         'joyce-gaza-chairperson.jpeg', route('team.joyce-phillip-gaza')],
          ] as [$role, $name, $credentials, $bio, $image, $profileUrl])
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
          <div class="member-bio flex-1 relative{{ $profileUrl ? ' member-bio--with-profile' : '' }}">
            <p class="member-role-badge">{{ $role }}</p>
            <p class="member-bio-text">{{ $bio }}</p>
            @if($profileUrl)
            <a href="{{ $profileUrl }}" class="member-profile-btn">View profile</a>
            @endif
          </div>

        </div>
        @endforeach
      </div>
    </div>

    {{-- ── BOARD OF DIRECTORS ── --}}
    <div>
      <div class="bg-[#28a745] rounded-t px-6 py-4 border-b-4 border-[#e86a10]">
        <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Board of Directors</h2>
      </div>
      <div class="grid grid-cols-1 gap-5 pt-6">
        @foreach([
          ['Chairperson',                    'Dr. Lamya Ibrahim Badri',  'Chairperson, Board of Directors',        'Dr. Lamya Ibrahim Badri is a governance, gender, and development specialist with over 20 years of experience working across Sudan and other conflict-affected contexts. She holds a Ph.D. in Women\'s Legal Rights within Customary Laws and has collaborated with leading international organizations, including UN Women, UNDP, UNFPA, and Musawah Global Movement. As Chairperson of Women for Justice and Equality (WOJE), Dr. Badri provides strategic leadership, governance oversight, and institutional direction. She brings strong expertise in policy guidance, accountability, and results-based programming. Her work integrates governance, community empowerment, and rights-based approaches, with a focus on strengthening institutional systems and advancing organizational effectiveness. Dr. Badri has extensive experience in program design, monitoring, and donor-funded project implementation, particularly in areas of peacebuilding, governance, and community resilience with a focus on Muslim women empowerment. She is committed to advancing equitable and accountable systems that support women\'s leadership and sustainable development in fragile and post-conflict settings.',                                                                                         'lamya-badir.jpeg', route('team.lamya-ibrahim-badri')],
          ['Vice Chairperson',               'Ms. Catherine Visensio Lolika', 'Vice Chairperson, Board of Directors',   'Supports the board\'s strategic oversight and organisational accountability. Committed to advancing inclusive policies that promote gender equality and protect the rights of women and girls in South Sudan.',                                                                                  'catherine-visensio-lolika.jpg', null],
          ['Board Treasurer',                'Ms. Maura Ajak',             'Board Treasurer',                        'Maura Ajak is an award-winning freelance journalist and multimedia professional (since 2014) for outlets including Al Jazeera English and BBC Africa Eye, with deep experience in human rights, peace, governance, and climate justice. As Board Treasurer of WOJE, she strengthens financial transparency, ethical stewardship, and accountable reporting in support of gender justice and community trust across South Sudan. She holds a Diploma in Communication and Public Relations from the University of Juba.',                                                                                                          'maura-ajak.png', route('team.maura-ajak')],
          ['Board Secretary',                'Ms. Zabib Musa Loro',          'Board Secretary',   'Zabib Musa Loro serves as the Executive Director of Women for Justice and Equality (WOJE), bringing over a decade of transformative leadership in gender programming, policy advocacy, and human rights defense. Her unwavering commitment to advancing women\'s rights has earned her international recognition, including the prestigious 2025 US International Women of Courage Award from the US State Department and the 2023 Outstanding Woman Human Rights Defender Award.',                                                                                                          'zabibloro.jpeg', route('team.zabib-loro')],
          ['Board Member',                   'Ms. Mariam Hamida',             'Board Member',                        'Ms. Mariam Hamida serves as a Board Member of WOJE, continuing to support financial governance and organisational sustainability following her service as Board Treasurer. She helps ensure WOJE\'s resources are managed with integrity and transparency and advances accountability alongside fellow directors.',                                                                                                          'mariam-hamida.jpeg', null],
          ['Board Member',                      'Ms. Jennifer John Malachi',            'Board Member',                        'Jennifer John Malachi is a South Sudanese student pursuing a B.Sc. in Data Science and Analytics at USIU-Africa and a Mastercard Foundation Scholar (Cohort 6). She advocates for women and girls and supports WOJE through community engagement, including M&E and digital storytelling on a 2025 Community Action Project in Kabu South and Luriki.',                                                                                                          'jennifer.jpeg', route('team.jennifer-john-malachi')],
        ] as [$role, $name, $credentials, $bio, $image, $profileUrl])
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
          <div class="member-bio flex-1 relative{{ $profileUrl ? ' member-bio--with-profile' : '' }}">
            <p class="member-role-badge">{{ $role }}</p>
            <p class="member-bio-text">{{ $bio }}</p>
            @if($profileUrl)
            <a href="{{ $profileUrl }}" class="member-profile-btn">View profile</a>
            @endif
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
            'zabibloro.jpeg',
            route('team.zabib-loro'),
          ],
          [
            'Program Manager',
            'Ms. Yika Marina Mogga',    
            'Program Manager',                
            'With over four years of professional experience, Yika Marina Mogga advances gender equality and social justice as Program Manager at WOJE, leading design, implementation, and evaluation across South Sudan. Her portfolio spans peacebuilding, GBV, health, and education. She holds a Bachelor\'s in Business Administration and a Diploma in Leadership and Development Studies.',                                                                                                                     
            'yika-marina-mogga.jpeg',
            route('team.yika-marina-mogga'),
          ],
          [
            'Finance & Operations',
            'Ms. Hamida Khamisa',       
            'Finance & Operations Manager',   
            'Hamida Khamisa is a seasoned finance professional with a unique multidisciplinary background. She holds a bachelor\'s degree in Psychology, complemented by diplomas in finance, logistics, project management, and evaluation. With over five years in the humanitarian sector, she combines financial planning, budgeting, and logistics with stakeholder engagement. As Finance & Operations Manager, she bridges program implementation and financial accountability and strengthens systems for effective service delivery.',                                                                                                      
            'hamida-khamisa.jpg',
            route('team.hamida-khamisa'),
          ],
          [
            'M&E Officer',
            'Mr. Sebit Abdulkarim',     
            'Monitoring & Evaluation Officer',
            'Sebit Abdulkarim is a graduate of Makerere University Business School (Kampala), holding a bachelor\'s degree in Business Administration. He earned a certificate in Leadership Skills from Salemi School of Leadership (Nigeria) and a diploma in Advanced ICT from Nakawa Vocational Institute, Kampala, Uganda. His diverse skill set includes Monitoring and Evaluation, Communication, Graphic Design, Website and Social Media Management, and Content Creation. He served Sanyu FM Kampala (Administration Star of the Year, 2021), then NASOSS as Communications and Advocacy Officer. Since April 2023 he has been with Women for Justice and Equality South Sudan as Team Leader of Communications and Advocacy with M&E support.',                                                                                                       
            'sebit-abdulkarim.jpg',
            route('team.sebit-abdulkarim'),
          ],
          [
            'GBV Officer – Raja',
            'Ms. Allen Samanya Zabibu',
            'GBV Officer',
            'Allen Samanya Zabibu is a dedicated South Sudanese professional born on July 26, 1992, who has devoted over 13 years of her career to protecting and empowering vulnerable populations, particularly women and children affected by gender-based violence. Currently residing in Juba and serving as a GBV Officer in Raja, Allen brings a unique combination of academic excellence and practical field experience to her vital work in community protection and social justice.',
            'allen-samanya-zabibu.jpeg',
            route('team.allen-samanya-zabibu'),
          ],
          [
            'GBV Officer',         
            'Ms. Anna Joggo Ruman',     
            'GBV Officer',                    
            'Supports survivors of gender-based violence through counseling, legal assistance, and community outreach. Works closely with local authorities to ensure protection and justice for vulnerable women and girls.',                                                                       
            'anna-joggo-ruman.jpg',
            null,
          ],
        ] as [$role, $name, $credentials, $bio, $image, $profileUrl])
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
          <div class="member-bio flex-1 relative{{ $profileUrl ? ' member-bio--with-profile' : '' }}">
            <p class="member-role-badge">{{ $role }}</p>
            <p class="member-bio-text">{{ $bio }}</p>
            @if($profileUrl)
            <a href="{{ $profileUrl }}" class="member-profile-btn">View profile</a>
            @endif
          </div>

        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

@endsection