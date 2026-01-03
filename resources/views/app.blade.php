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

    {{-- <link rel="stylesheet" href="{{ asset('output.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --brand-orange: #f17e28;
            --brand-blue: #0c7bb8;
            --brand-gold: #b8a168;
            --brand-flame: #ff8c00;
            --brand-bg: #fef9f3;
            --brand-dark: #2b2b2b;
            --brand-red: #e63946;
            --brand-green: #2a9d8f;
            --brand-purple: #7209b7;
            --brand-indigo: #3a0ca3;
        }
        
        * {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        body {
            background-color: var(--brand-bg);
            color: var(--brand-dark);
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
            border-radius: 16px;
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(241, 126, 40, 0.25);
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
            background: linear-gradient(
                135deg,
                var(--brand-bg),
                #ffffff,
                var(--brand-bg)
            );
        }
        
        /* Parallax */
        .parallax-bg {
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
        
        /* Mobile Menu */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .mobile-menu.active {
            max-height: 600px;
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
        
        /* FIX: Mobile menu backdrop for better UX */
        @media (max-width: 1024px) {
            .mobile-menu.active {
                position: relative;
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
            background: linear-gradient(135deg, var(--brand-orange), var(--brand-red));
        }
        
        .gradient-brand-blue {
            background: linear-gradient(135deg, var(--brand-blue), var(--brand-indigo));
        }
        
        .gradient-brand-green {
            background: linear-gradient(135deg, var(--brand-green), var(--brand-blue));
        }
        
        .gradient-brand-purple {
            background: linear-gradient(135deg, var(--brand-purple), var(--brand-indigo));
        }
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


<nav style="margin-top: -80px;" id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-white shadow-sm">
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
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-red transition-all">
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
                            <span>Address will be provided</span>
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

        // Handle contact form submission
        function handleContactForm(event) {
            event.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            event.target.reset();
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