@extends('app')

@section('content')

    <!-- HOME PAGE -->
    <div id="home" class="page-section active" style="margin-top: 80px;">
        <!-- Hero Section -->
        <section class="hero-gradient py-20 lg:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="inline-block">
                            <span class="bg-red-100 text-brand-red px-4 py-2 rounded-full text-sm font-semibold">Established 2010 • Registered 2019</span>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Welcome to <span class="gradient-text">FCLM</span>
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Helping mankind discover the love of God, experience His power, and fulfill their God-given purpose.
                        </p>
                        
                        <!-- Pastor Message Card -->
                        <div class="bg-white rounded-2xl shadow-xl p-6 border-l-4 border-brand-red">
                            <p class="text-gray-700 italic mb-4">
                                "I am delighted to have you here. On behalf of the Board of Trustees, I pray that God Almighty will greatly enrich your life as you fellowship with us..."
                            </p>
                            <div class="flex items-center">
                                <div class="w-16 h-16 gradient-brand rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                    PS
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-900">Prof. Adeyinka Sobowale</h4>
                                    <p class="text-gray-600 text-sm">Presiding Pastor</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a  href="{{ route('about') }}" class="gradient-brand text-white px-8 py-4 rounded-full hover:shadow-xl transform hover:scale-105 transition-all font-semibold">
                                Learn More About Us
                            </a>
                            <a href="{{ route('programmes') }}" class="bg-white text-brand-red border-2 border-brand-red px-8 py-4 rounded-full hover:bg-red-50 transition-all font-semibold">
                                Our Programmes
                            </a>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="image-placeholder rounded-3xl shadow-2xl aspect-[4/3]">
                            <img style=" width:100%; border-radius:50px;" src="{{ asset('lead_pastor.jpg') }}">
                        </div>
                        <div class="absolute -bottom-6 -right-6 gradient-brand text-white p-6 rounded-2xl shadow-xl">
                            <p class="text-sm font-semibold">Join Us Weekly</p>
                            <p class="text-2xl font-bold">Sun 9-11am</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Links -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Explore Our Ministry</h2>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <a  href="{{ route('programmes') }}" class="card-hover bg-gradient-to-br from-red-50 to-white rounded-2xl p-8 cursor-pointer border border-red-100">
                        <div class="w-16 h-16 gradient-brand rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-church text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Our Programmes</h3>
                        <p class="text-gray-600 mb-4">Weekly services, prayer meetings, and ministry training programs designed for spiritual growth.</p>
                        <span class="text-brand-red font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </a>

                    <a href="{{ route('publications') }}" class="card-hover bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 cursor-pointer border border-blue-100">
                        <div class="w-16 h-16 gradient-brand-blue rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Resources</h3>
                        <p class="text-gray-600 mb-4">Free books, audio messages, tracts, and spiritual growth materials for your journey.</p>
                        <span class="text-brand-blue font-semibold inline-flex items-center">
                            Explore Resources <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </a>

                    <a  href="{{ route('donation') }}" class="card-hover bg-gradient-to-br from-green-50 to-white rounded-2xl p-8 cursor-pointer border border-green-100">
                        <div class="w-16 h-16 gradient-brand-green rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-hands-helping text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Support Ministry</h3>
                        <p class="text-gray-600 mb-4">Partner with us through tithes, offerings, and special support for God's work.</p>
                        <span class="text-brand-green font-semibold inline-flex items-center">
                            Give Now <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Vision & Mission</h2>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm p-8 lg:p-12 mb-12">
                    <div class="flex items-start space-x-6">
                        <div class="w-20 h-20 gradient-brand rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-eye text-white text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">Vision</h3>
                            <p class="text-xl text-gray-700 italic leading-relaxed">
                                "Helping mankind to discover the love of God, experience his power and utilize same for the fulfilment of their God given purpose."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl shadow-sm p-8">
                        <h4 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-bullseye text-brand-orange mr-3"></i>
                            Mission Objectives
                        </h4>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-xl flex-shrink-0"></i>
                                <span class="text-gray-700">Making Christian disciples who manifest love, compassion and God's power in daily living</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-xl flex-shrink-0"></i>
                                <span class="text-gray-700">Propagating the good news of salvation in Christ and liberating men from bondage</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-xl flex-shrink-0"></i>
                                <span class="text-gray-700">Equipping Christian workers for their end time roles and developing effective workforce</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-xl flex-shrink-0"></i>
                                <span class="text-gray-700">Raising Christian leaders with godly character and integrity</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-xl flex-shrink-0"></i>
                                <span class="text-gray-700">Establishing Churches, Schools, Hospitals and Help centres for the masses</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-8">
                        <h4 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-calendar-alt text-brand-orange mr-3"></i>
                            Weekly Services
                        </h4>
                        <div class="space-y-4">
                            <div class="bg-gradient-to-r from-red-50 to-white p-6 rounded-xl border-l-4 border-brand-red">
                                <div class="flex justify-between items-center mb-2">
                                    <h5 class="font-bold text-gray-900">School of Life</h5>
                                    <span class="bg-red-100 text-brand-red px-3 py-1 rounded-full text-sm font-semibold">Wednesday</span>
                                </div>
                                <p class="text-brand-red font-bold text-xl">5:00 - 6:30 PM</p>
                            </div>

                            <div class="bg-gradient-to-r from-blue-50 to-white p-6 rounded-xl border-l-4 border-brand-blue">
                                <div class="flex justify-between items-center mb-2">
                                    <h5 class="font-bold text-gray-900">Family Prayer Meeting</h5>
                                    <span class="bg-blue-100 text-brand-blue px-3 py-1 rounded-full text-sm font-semibold">Saturday</span>
                                </div>
                                <p class="text-brand-blue font-bold text-xl">8:00 - 9:00 AM</p>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-white p-6 rounded-xl border-l-4 border-brand-green">
                                <div class="flex justify-between items-center mb-2">
                                    <h5 class="font-bold text-gray-900">Sunday Worship Experience</h5>
                                    <span class="bg-green-100 text-brand-green px-3 py-1 rounded-full text-sm font-semibold">Sunday</span>
                                </div>
                                <p class="text-brand-green font-bold text-xl">9:00 - 11:00 AM</p>
                            </div>
                        </div>
                        <a style="padding:10px;" href="{{ route('programmes') }}" class="w-full mt-6 gradient-brand text-white py-3 rounded-xl hover:shadow-sm transition-all font-semibold">
                            View All Programmes <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 gradient-brand text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">Join Our Community</h2>
                <p class="text-xl mb-8 opacity-90">Experience God's love and power in a welcoming community of believers</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}" class="bg-white text-brand-red px-8 py-4 rounded-full hover:shadow-2xl transform hover:scale-105 transition-all font-semibold">
                        Visit Us
                    </a>
                    <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full hover:bg-black hover:text-brand-red transition-all font-semibold">
                        Contact Us
                    </a>
                </div>
            </div>
        </section>
    </div>

 @endsection