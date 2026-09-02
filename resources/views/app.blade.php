<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For .ico -->
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<!-- OR for PNG/JPG -->
<link rel="icon" href="{{ asset('logo.jpg') }}" type="image/jpeg">

<!-- Optional for high-res devices -->
<link rel="shortcut icon" href="{{ asset('logo.jpg') }}" type="image/jpeg">

    <title>FCLM - Firebrand Christian Life Ministry</title>
    <script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Give+You+Glory&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('output.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@php track_visit(); @endphp
    <style>
        
        :root {
            --brand-orange: #d97706;
            --brand-blue: #0f766e;
            --brand-gold: #b45309;
            --brand-flame: #ff8c00;
            --brand-bg: #fcfcfb;
            --brand-dark: #172033;
            --brand-red: #c2410c;
            --brand-green: #15803d;
            --brand-purple: #7209b7;
            --brand-indigo: #3a0ca3;
        }
        
        *{
   font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}

        
        body {
            background: #fcfcfb;
            color: var(--brand-dark);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        ::selection { background: #fed7aa; color: #7c2d12; }

        #navbar {
            top: 0;
            margin-top: 0 !important;
            background: rgba(252, 252, 251, .96) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e8e7e4;
            box-shadow: none !important;
        }
        #navbar > div > div { min-height: 76px; padding-top: .6rem; padding-bottom: .6rem; }
        #navbar img { width: 56px !important; height: 56px !important; border-radius: 14px !important; box-shadow: 0 8px 18px rgba(15,23,42,.12); }
        #navbar .nav-link { font-size: .875rem; letter-spacing: .01em; }
        #navbar .gradient-brand { background: var(--brand-dark); border-radius: 8px; box-shadow: none; }

        /* Inner-page title: deliberately text-led, without the old large image banner. */
        .page-header {
            min-height: 0;
            height: auto !important;
            padding: 3.25rem 3.5rem;
            overflow: visible;
            border-radius: 0;
            box-shadow: none;
            isolation: auto;
            background: #f3f1ec !important;
            border-left: 3px solid var(--brand-red);
        }
        .page-header::after, .page-header > .absolute { display: none; }
        .page-header > .relative { display: block !important; height: auto !important; text-align: left !important; }
        .page-header h1 { font-size: clamp(2.35rem, 4vw, 4rem) !important; letter-spacing: -.055em; line-height: 1.03; color: var(--brand-dark) !important; }
        .page-header p { max-width: 42rem; margin: .75rem 0 0 !important; color: #526075 !important; }
        .page-header .w-24 { margin: 1.25rem 0 0 !important; width: 3.25rem; height: 2px; background: var(--brand-red); }

        section.py-20 { padding-top: 5rem; padding-bottom: 5rem; }
        .bg-white.rounded-3xl, .bg-white.rounded-2xl, .bg-white.rounded-xl {
            border: 1px solid #e8e7e4;
            box-shadow: none;
        }
        
        /* Page Animations */
        .page-section {
            display: none;
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        
        .page-section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Gradient Text (Fire + Gold) */
        .gradient-text {
            background: linear-gradient(
                135deg,
                var(--brand-orange),
                var(--brand-red),
                var(--brand-gold)
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Cards */
        .card-hover {
            background: #fff;
            border-radius: 12px;
            transition: transform .25s ease, border-color .25s ease;
            border: 1px solid #e8e7e4;
        }
        
        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: none;
            border-color: var(--brand-orange);
        }
        
        /* Dropdown */
        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .dropdown:hover .dropdown-menu {
            max-height: 500px;
        }
        
        /* Hero Section */
        .hero-gradient {
            background: linear-gradient(110deg, #fff 0%, #fffaf1 55%, #f3f6f4 100%);
        }
        
        /* Parallax */
        .parallax-bg {
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
        
        /* Mobile Menu */
        .mobile-menu {
            display: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            position: fixed;
            top: 76px;
            left: 12px;
            right: 12px;
            max-height: calc(100vh - 92px);
            overflow-y: auto;
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }
        
        /* Pulse (Fire Energy) */
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.75; }
        }
        
        /* Stats */
        .stat-counter {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--brand-orange);
        }
        
        /* Navigation */
        .nav-link {
            position: relative;
            color: var(--brand-dark);
            font-weight: 500;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(
                90deg,
                var(--brand-orange),
                var(--brand-blue)
            );
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Image Placeholder */
        .image-placeholder {
            background: linear-gradient(
                135deg,
                var(--brand-gold),
                var(--brand-bg)
            );
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-blue);
            font-size: 3rem;
            border-radius: 12px;
        }
        
        /* FIX: Mobile menu z-index */
        .mobile-menu {
            z-index: 100;
        }
        
        /* FIX: Mobile menu button styling */
        .mobile-menu-button {
            z-index: 101;
            position: relative;
        }
        
        /* FIX: Ensure mobile menu items are clickable */
        .mobile-menu a, 
        .mobile-menu button {
            cursor: pointer;
            position: relative;
            z-index: 102;
        }
        
        /* Mobile menu stays above the page and can scroll independently. */
        @media (max-width: 1024px) {
            .mobile-menu.active {
                position: fixed;
                z-index: 1000;
                background: white;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
            
            .mobile-menu a, 
            .mobile-menu button {
                position: relative;
                z-index: 1001;
            }
        }
        
        /* Using CSS Variables for Colors */
        .bg-brand-orange {
            background-color: var(--brand-orange);
        }
        
        .bg-brand-blue {
            background-color: var(--brand-blue);
        }
        
        .bg-brand-gold {
            background-color: var(--brand-gold);
        }
        
        .bg-brand-red {
            background-color: var(--brand-red);
        }
        
        .bg-brand-green {
            background-color: var(--brand-green);
        }
        
        .bg-brand-purple {
            background-color: var(--brand-purple);
        }
        
        .bg-brand-indigo {
            background-color: var(--brand-indigo);
        }
        
        .text-brand-orange {
            color: var(--brand-orange);
        }
        
        .text-brand-blue {
            color: var(--brand-blue);
        }
        
        .text-brand-red {
            color: var(--brand-red);
        }
        
        .text-brand-green {
            color: var(--brand-green);
        }
        
        .border-brand-orange {
            border-color: var(--brand-orange);
        }
        
        .border-brand-blue {
            border-color: var(--brand-blue);
        }
        
        .border-brand-red {
            border-color: var(--brand-red);
        }
        
        .gradient-brand {
            background: var(--brand-red);
        }
        
        .gradient-brand-blue {
            background: var(--brand-blue);
        }
        
        .gradient-brand-green {
            background: var(--brand-green);
        }
        
        .gradient-brand-purple {
            background: #4338ca;
        }

        footer { border-top: 1px solid rgba(255,255,255,.08); }
        button, a { -webkit-tap-highlight-color: transparent; }
        footer a { transition: color .2s ease, transform .2s ease; }
        footer a:hover { transform: translateX(2px); }

        /* Page-specific layouts: each page has a distinct, restrained composition. */
        #home .hero-gradient { min-height: 650px; display: flex; align-items: center; }
        #home .hero-gradient h1 { max-width: 680px; }
        #home .slider-container .image-placeholder { background: #e9ece9; border-radius: 16px; box-shadow: 18px 18px 0 #eee7dc; }
        #home .slider-container .slide { border-radius: 16px; }
        #home .slider-container > .absolute { border-radius: 10px; right: -12px; bottom: -12px; }
        #home .grid.md\:grid-cols-3 > a { padding: 2rem; }
        #home .grid.md\:grid-cols-3 > a > div:first-child { border-radius: 10px; }
        #home .bg-gray-50 { background: #f4f5f3; }

        #about .prose { font-size: 1.08rem; line-height: 1.9; }
        #about .prose strong { color: var(--brand-red); }
        #about .grid.sm\:grid-cols-2.md\:grid-cols-3 > div { background: transparent; box-shadow: none; border: 0; padding: 1rem; }
        #about .grid.sm\:grid-cols-2.md\:grid-cols-3 > div:hover { transform: none; }
        #about .grid.sm\:grid-cols-2.md\:grid-cols-3 img { width: 9rem; height: 9rem; object-fit: contain; object-position: center top; background:#f1f5f9; border-radius: 50%; border: 5px solid #fff; box-shadow: 0 0 0 1px #e8e7e4; }

        #programmes .bg-white.rounded-3xl { position: relative; padding: 3rem; }
        #programmes .bg-white.rounded-3xl > .flex:first-child { border-bottom: 1px solid #eceae6; padding-bottom: 1.5rem; }
        #programmes .grid.md\:grid-cols-3 > div, #programmes .grid.md\:grid-cols-2.lg\:grid-cols-4 > div { border-radius: 10px; border-width: 1px; }
        #programmes .grid.md\:grid-cols-3 > div { background: #fff; border-color: #e8e7e4; }

        #publications .category-tab { border: 1px solid #dedbd4; background: #fff; color: var(--brand-dark); border-radius: 8px; }
        #publications .category-tab.active { background: var(--brand-dark); border-color: var(--brand-dark); color: #fff; }
        #publications .filter-btn { border-radius: 7px; }
        #publications .tract-item, #publications .audio-item, #publications .resource-item { border-radius: 12px; box-shadow: none; }
        #publications .tract-item:hover, #publications .audio-item:hover, #publications .resource-item:hover { transform: translateY(-3px); border-color: var(--brand-orange); }

        #gallery .grid > button { border: 1px solid #e8e7e4; border-radius: 10px; background: #fff; padding: .35rem; }
        #gallery .grid > button img { border-radius: 7px; }
        #gallery .grid > button:hover { border-color: var(--brand-orange); }

        #contact .space-y-6 > div { border: 1px solid #e8e7e4; box-shadow: none; border-radius: 12px; }
        #contact form input, #contact form textarea { border-radius: 8px !important; border-color: #d9d7d1; }
        #contact form input:focus, #contact form textarea:focus { border-color: var(--brand-orange) !important; }
        #contact .gradient-brand-purple { border-radius: 12px; }

        #donations .grid.md\:grid-cols-2.lg\:grid-cols-4 > div { border-radius: 12px; box-shadow: none; }
        #donations .grid.md\:grid-cols-2.lg\:grid-cols-4 button { border-radius: 8px; font-weight: 600; }
        #donations .shadow-xl { box-shadow: none; border: 1px solid #e8e7e4; }
        @media (max-width: 1024px) { #navbar > div > div { min-height: 70px; } }
        @media (max-width: 640px) { section.py-20 { padding-top: 3.75rem; padding-bottom: 3.75rem; } .page-header { padding: 2.25rem 1.5rem; } }
    </style>
</head>
<body class="bg-gray-50">
    {{-- <nav style="margin-top: -80px;" id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3 cursor-pointer">
                <img style="height:80px; width:80px;" src="{{ asset('logo.jpg') }}" alt="Logo"/>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('home') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Home
                </a>

                <a href="{{ route('about') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('about') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   About
                </a>

                <div class="dropdown relative">
                    <a href="{{ route('programmes') }}"
                       class="nav-link transition-colors font-medium {{ request()->routeIs('programmes') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                        Programmes <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </a>

                    <div class="dropdown-menu absolute top-full left-0 bg-white shadow-sm rounded-lg mt-2 py-2 w-56 z-50">
                        <a href="{{ route('programmes') }}#fbc"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#fbc') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           Firebrand Believer's Church
                        </a>

                        <a href="{{ route('programmes') }}#ministry"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#ministry') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           School of Ministry
                        </a>

                        <a href="{{ route('programmes') }}#outreach"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#outreach') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           Community Outreach
                        </a>
                    </div>
                </div>

                <a href="{{ route('publications') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('publications') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Publications
                </a>

                <a href="{{ route('gallery') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('gallery') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Gallery
                </a>

                <a href="{{ route('contact') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('contact') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Contact
                </a>

                <a href="{{ route('donation') }}"
                   class="gradient-brand text-white px-6 py-2 rounded-full hover:shadow-sm transform hover:scale-105 transition-all">
                   Give Online
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden text-gray-700 mobile-menu-button" onclick="toggleMobileMenu(event)">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu lg:hidden bg-white shadow-sm rounded-lg mt-2 hidden">
            <div class="py-4 space-y-3">
                <a href="{{ route('home') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('home') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   Home
                </a>

                <a href="{{ route('about') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('about') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   About Us
                </a>

                <a href="{{ route('programmes') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('programmes') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   Programmes
                </a>

                <a href="{{ route('publications') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('publications') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   Publications
                </a>

                <a href="{{ route('gallery') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('gallery') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   Gallery
                </a>

                <a href="{{ route('contact') }}"
                   class="block px-4 py-3 rounded transition-colors {{ request()->routeIs('contact') ? 'text-brand-orange font-semibold bg-red-50' : 'text-gray-700 hover:bg-red-50' }}">
                   Contact
                </a>

                <a href="{{ route('donation') }}"
                   class="w-full block gradient-brand text-white px-4 py-3 rounded-lg hover:shadow-sm transition-all mt-4 text-center">
                   Give Online
                </a>
            </div>
        </div>
    </div>
</nav> --}}


<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3 cursor-pointer">
            <a href="{{ route('home') }}">                <img style="height:80px; width:80px;" src="{{ asset('logo.jpg') }}" alt="Logo"/>
</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('home') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Home
                </a>

                <a href="{{ route('about') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('about') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   About
                </a>

                <div class="dropdown relative">
                    <a href="{{ route('programmes') }}"
                       class="nav-link transition-colors font-medium {{ request()->routeIs('programmes') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                        Programmes <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </a>

                    <div class="dropdown-menu absolute top-full left-0 bg-white shadow-sm rounded-lg mt-2 py-2 w-56 z-50">
                        <a href="{{ route('programmes') }}#fbc"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#fbc') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           Firebrand Believer's Church
                        </a>

                        <a href="{{ route('programmes') }}#ministry"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#ministry') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           School of Ministry
                        </a>

                        <a href="{{ route('programmes') }}#outreach"
                           class="block px-4 py-2 hover:bg-red-50 {{ request()->is('programmes#outreach') ? 'text-brand-orange font-semibold' : 'text-gray-700' }}">
                           Community Outreach
                        </a>
                    </div>
                </div>

                <a href="{{ route('publications') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('publications') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Publications
                </a>

                <a href="{{ route('gallery') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('gallery') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Gallery
                </a>

                <a href="{{ route('contact') }}"
                   class="nav-link transition-colors font-medium {{ request()->routeIs('contact') ? 'text-brand-orange font-semibold' : 'text-gray-700 hover:text-brand-orange' }}">
                   Contact
                </a>

                <a href="{{ route('donation') }}"
                   class="gradient-brand text-white px-6 py-2 rounded-full hover:shadow-sm transform hover:scale-105 transition-all">
                   Give Online
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden text-gray-700 mobile-menu-button" onclick="toggleMobileMenu(event)">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

            <!-- Mobile Menu - FIXED with proper z-index -->
            <div id="mobileMenu" class="mobile-menu lg:hidden bg-white shadow-lg rounded-lg mt-2">
                <div class="py-4 space-y-3">
                    <a href="{{ route('home') }}"  class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">Home</a>
                    <a href="{{ route('about') }}"  class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">About Us</a>
                    <a href="{{ route('programmes') }}" class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">Programmes</a>
                    <a href="{{ route('publications') }}"  class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">Publications</a>
                    <a href="{{ route('gallery') }}" class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">Gallery</a>
                    <a href="{{ route('contact') }}"  class="block px-4 py-3 text-gray-700 hover:bg-red-50 rounded transition-colors">Contact</a>
                    <a  href="{{ route('donation') }}"  class="w-full gradient-brand text-white px-4 py-3 rounded-lg hover:shadow-lg transition-all mt-4">
                        Give Online
                    </a>
                </div>
            </div>
        </div>
    </nav>


    @yield('content')


       <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 gradient-brand rounded-full flex items-center justify-center">
                            <i class="fas fa-church text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">FCLM</h3>
                            <p class="text-xs text-gray-400">Est. 2010</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Firebrand Christian Life Ministry - Helping mankind discover God's love and fulfill their divine purpose.</p>
                    <div class="flex space-x-3">
                        <a target="_blank" href="https://web.facebook.com/fclmng" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="https://x.com/firebrandac" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">

<i class="fa-brands fa-x-twitter"></i>
                        </a>
                      
                        <a target="_blank" href="https://www.instagram.com/fclmng?igsh=ZG9ndnAwbzlqYWhv" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}"  class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}"  class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('programmes') }}"  class="text-gray-400 hover:text-white transition-colors">Programmes</a></li>
                        <li><a href="{{ route('publications') }}"  class="text-gray-400 hover:text-white transition-colors">Publications</a></li>
                        <li><a href="{{ route('gallery') }}"  class="text-gray-400 hover:text-white transition-colors">Gallery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Our Programmes</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('programmes') }}#fbc"  class="text-gray-400 hover:text-white transition-colors">Believer's Church</a></li>
                        <li><a href="{{ route('programmes') }}#ministry"  class="text-gray-400 hover:text-white transition-colors">School of Ministry</a></li>
                        <li><a href="{{ route('programmes') }}#outreach"  class="text-gray-400 hover:text-white transition-colors">Community Outreach</a></li>
                        <li><a href="{{ route('donation') }}"  class="text-gray-400 hover:text-white transition-colors">Support Ministry</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Contact Info</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-phone mt-1 mr-3 text-brand-orange"></i>
                            <span>+234 80 6210 1020</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-envelope mt-1 mr-3 text-brand-orange"></i>
                            <span>fclmng2010@gmail.com</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-brand-orange"></i>
                            <span>Firebrand Believers Church (Beulah Centre)
Plot 9, Sanni Street off Aregbe Road, Aregbesola Area, Abeokuta, Ogun State, Nigeria</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="text-center text-gray-400">
                    <p class="mb-2">&copy; 2024 Firebrand Christian Life Ministry. All rights reserved.</p>
                    {{-- <p class="text-sm">Registered with Corporate Affairs Commission (13th May, 2019)</p> --}}
                </div>
            </div>
        </div>
    </footer>

    <script>
       

        // Toggle mobile menu - FIXED with event parameter
        function toggleMobileMenu(event) {
            if (event) event.stopPropagation();
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
            
            // Prevent body scroll when menu is open
            if (mobileMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }



        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl');
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });

        // Close mobile menu when clicking outside - FIXED
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuBtn = document.getElementById('mobileMenuBtn');
            
            // Check if click is outside menu and menu button
            if (!mobileMenu.contains(event.target) && event.target !== menuBtn && !menuBtn.contains(event.target)) {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Close mobile menu when clicking on a link inside it
        document.querySelectorAll('#mobileMenu a, #mobileMenu button').forEach(item => {
            item.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobileMenu');
                mobileMenu.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });

        // Smooth reveal animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards for animation
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html
