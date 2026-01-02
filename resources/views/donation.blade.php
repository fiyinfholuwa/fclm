@extends('app')

@section('content')

 
    
    <!-- DONATIONS PAGE -->
    <div id="donations" class="" style="margin-top: 80px;">
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">Support Our Ministry</h1>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                    <p class="text-xl text-gray-600 mt-4">God loves a cheerful giver</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <div class="bg-white rounded-2xl shadow-sm p-8 text-center card-hover">
                        <div class="w-16 h-16 gradient-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-percent text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Tithes</h3>
                        <p class="text-gray-600 text-sm mb-4">Return your tenth to the Lord</p>
                        <button class="w-full bg-brand-green text-white py-2 rounded-lg hover:bg-green-700 transition-all">
                            Give Tithe
                        </button>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-8 text-center card-hover">
                        <div class="w-16 h-16 gradient-brand-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-gift text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Offerings</h3>
                        <p class="text-gray-600 text-sm mb-4">Give your freewill offering</p>
                        <button class="w-full bg-brand-blue text-white py-2 rounded-lg hover:bg-blue-700 transition-all">
                            Give Offering
                        </button>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-8 text-center card-hover">
                        <div class="w-16 h-16 gradient-brand-purple rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Pledges & Vows</h3>
                        <p class="text-gray-600 text-sm mb-4">Fulfill your promises to God</p>
                        <button class="w-full bg-brand-purple text-white py-2 rounded-lg hover:bg-purple-700 transition-all">
                            Make Pledge
                        </button>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-8 text-center card-hover">
                        <div class="w-16 h-16 gradient-brand rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Special Support</h3>
                        <p class="text-gray-600 text-sm mb-4">Support specific projects</p>
                        <button class="w-full bg-brand-red text-white py-2 rounded-lg hover:bg-red-700 transition-all">
                            Give Support
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Bank Transfer Information</h2>
                    <div class="max-w-2xl mx-auto">
                        <div class="bg-gray-50 rounded-xl p-6 mb-6">
                            <p class="text-gray-700 mb-4">
                                <strong>Important:</strong> When making online transfers, kindly mark your donation with its purpose in the description line on your banking platform.
                            </p>
                            <div class="bg-white rounded-lg p-4 border-l-4 border-brand-red">
                                <p class="text-gray-700"><strong>Bank Name:</strong> [Bank details to be provided]</p>
                                <p class="text-gray-700"><strong>Account Number:</strong> [Account number]</p>
                                <p class="text-gray-700"><strong>Account Name:</strong> Firebrand Christian Life Ministry</p>
                            </div>
                        </div>

                        <div class="gradient-brand-green rounded-xl p-6 text-white text-center">
                            <i class="fas fa-shield-alt text-4xl mb-4 opacity-80"></i>
                            <h3 class="text-xl font-bold mb-2">Transparent & Accountable</h3>
                            <p class="opacity-90">Every donation is properly accounted for and judiciously utilized for intended purposes.</p>
                        </div>

                        <div class="mt-8 text-center">
                            <p class="text-gray-700 mb-4">For more information on donations:</p>
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="tel:+2348062101020" class="flex items-center space-x-2 bg-gray-100 px-6 py-3 rounded-lg hover:bg-gray-200 transition-all">
                                    <i class="fas fa-phone text-brand-green"></i>
                                    <span>+234 80 6210 1020</span>
                                </a>
                                <a href="tel:+2348034737100" class="flex items-center space-x-2 bg-gray-100 px-6 py-3 rounded-lg hover:bg-gray-200 transition-all">
                                    <i class="fas fa-phone text-brand-green"></i>
                                    <span>+234 80 3473 7100</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection