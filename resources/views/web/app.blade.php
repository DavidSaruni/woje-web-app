<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    @yield('title','WOJE - Women for Justice & Equality')
  </title>
  <link rel="icon" type="image/png" href="{{ asset('woje-logo.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#f53003',
            'primary-dark': '#d02802',
            'primary-light': '#ff4433',
            accent: '#ff6b35',
            'accent-light': '#ff8566',
            gold: '#f8b803',
            'woje-red': '#f53003',
            'woje-orange': '#ff6b35',
            'woje-green': '#10b981',
            'woje-green-dark': '#059669',
          },
          fontFamily: {
            serif: ['Georgia', 'Times New Roman', 'serif'],
            sans: ['Arial', 'Helvetica', 'sans-serif'],
          },
          fontSize: {
            'xs': ['0.875rem', '1.25rem'],
            'sm': ['1rem', '1.5rem'],
            'base': ['1.125rem', '1.75rem'],
            'lg': ['1.25rem', '2rem'],
            'xl': ['1.375rem', '2.25rem'],
            '2xl': ['1.75rem', '2.5rem'],
            '3xl': ['2.25rem', '3rem'],
            '4xl': ['2.75rem', '3.5rem'],
            '5xl': ['3.25rem', '4rem'],
          }
        }
      }
    }
  </script>
  <style>
    html { scroll-behavior: smooth; }
    .hero-slide { display: none; animation: fadeIn 0.8s ease; }
    .hero-slide.active { display: block; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    .nav-link { position: relative; }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #ff6b35;
      transition: width 0.3s ease;
    }
    .nav-link:hover::after { width: 100%; }
    .partner-logo { filter: grayscale(100%); opacity: 0.6; transition: all 0.3s ease; }
    .partner-logo:hover { filter: grayscale(0%); opacity: 1; }
    .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(245,48,3,0.15); }
    .mobile-menu { display: none; }
    .mobile-menu.open { display: block; }
    .stats-counter { animation: countUp 2s ease-out forwards; }
    @keyframes countUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .gradient-text {
      background: linear-gradient(135deg, #f53003, #ff6b35);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .section-divider {
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, #f53003, #ff6b35);
      border-radius: 2px;
    }
    .testimonial-dots button.active { background: #f53003; }
    img { object-fit: cover; }
  </style>
  @stack('styles')
</head>
<body class="font-sans text-gray-800 bg-white">

<!-- navbar -->
    @include('web.layouts.navbar')


    <div>
        @yield('content')
    </div>
  <!-- FOOTER -->
    @include('web.layouts.footer')

  <!-- Scroll to top button -->
  <button id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" class="fixed bottom-6 right-6 w-12 h-12 bg-primary text-white rounded-full shadow-lg flex items-center justify-center hover:bg-primary-dark transition-all opacity-0 translate-y-4 duration-300 z-50" style="transition: opacity 0.3s, transform 0.3s, background 0.2s;">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
  </button>

  <script>
    // Testimonial Carousel
    let testimonialCurrentSlide = 0;
    const testimonialTrack = document.querySelector('.testimonial-track');
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const testimonialDots = document.querySelectorAll('.testimonial-dot');
    const testimonialTotalSlides = testimonialSlides.length;

    function goToTestimonialSlide(slideIndex) {
      if (slideIndex < 0) slideIndex = testimonialTotalSlides - 1;
      if (slideIndex >= testimonialTotalSlides) slideIndex = 0;
      
      testimonialCurrentSlide = slideIndex;
      testimonialTrack.style.transform = `translateX(-${slideIndex * 100}%)`;
      
      // Update dots
      testimonialDots.forEach((dot, index) => {
        if (index === slideIndex) {
          dot.classList.remove('bg-white/30');
          dot.classList.add('bg-white/50');
        } else {
          dot.classList.remove('bg-white/50');
          dot.classList.add('bg-white/30');
        }
      });
    }

    function nextTestimonialSlide() { goToTestimonialSlide(testimonialCurrentSlide + 1); }
    function prevTestimonialSlide() { goToTestimonialSlide(testimonialCurrentSlide - 1); }

    // Event listeners for carousel controls
    document.querySelector('.testimonial-next')?.addEventListener('click', nextTestimonialSlide);
    document.querySelector('.testimonial-prev')?.addEventListener('click', prevTestimonialSlide);

    // Event listeners for dots
    testimonialDots.forEach((dot, index) => {
      dot.addEventListener('click', () => goToTestimonialSlide(index));
    });

    // Auto-play carousel
    setInterval(nextTestimonialSlide, 5000);

    // Hero Slider
    let heroCurrentSlide = 0;
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.slide-dot');
    let heroSlideInterval = setInterval(nextHeroSlide, 5000);

    function goToHeroSlide(n) {
      heroSlides[heroCurrentSlide].classList.remove('active');
      heroDots[heroCurrentSlide].classList.remove('bg-white');
      heroDots[heroCurrentSlide].classList.add('bg-white/40');
      heroCurrentSlide = (n + heroSlides.length) % heroSlides.length;
      heroSlides[heroCurrentSlide].classList.add('active');
      heroDots[heroCurrentSlide].classList.remove('bg-white/40');
      heroDots[heroCurrentSlide].classList.add('bg-white');
    }
    
    function nextHeroSlide() { goToHeroSlide(heroCurrentSlide + 1); }
    function prevHeroSlide() { goToHeroSlide(heroCurrentSlide - 1); }

    // Mobile menu
    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('open');
    }

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
      const nav = document.getElementById('navbar');
      const scrollTop = document.getElementById('scrollTop');
      if (window.scrollY > 50) {
        nav.classList.add('shadow-md');
        scrollTop.style.opacity = '1';
        scrollTop.style.transform = 'translateY(0)';
      } else {
        nav.classList.remove('shadow-md');
        scrollTop.style.opacity = '0';
        scrollTop.style.transform = 'translateY(1rem)';
      }
    });

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    const animateCounters = () => {
      counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;
        
        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(() => animateCounters(), 10);
        } else {
          if (target >= 1000) {
            counter.innerText = (target / 1000).toFixed(0) + 'K+';
          } else {
            counter.innerText = target + '+';
          }
        }
      });
    };

    // Intersection Observer for counter animation
    const observerOptions = {
      threshold: 0.5,
      rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);
    
    // Observe the impact section
    const impactSection = document.querySelector('#impact');
    if (impactSection) {
      observer.observe(impactSection);
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          // Close mobile menu
          document.getElementById('mobile-menu').classList.remove('open');
        }
      });
    });
  </script>

  <x-sweet-alert/>
</body>
</html>