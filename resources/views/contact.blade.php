@extends('app')

@section('content')

    

    <!-- CONTACT PAGE -->
    <div id="contact" class="" style="margin-top: 80px;">
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">Contact Us</h1>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                    <p class="text-xl text-gray-600 mt-4">We'd love to hear from you</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-8">Get In Touch</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-sm">
                                <div class="w-12 h-12 gradient-brand-green rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Phone</h4>
                                    <p class="text-gray-600">+234 80 6210 1020 (WhatsApp Only)</p>
                                    <p class="text-gray-600">+234 80 3473 7100 (Calls & WhatsApp)</p>
                                    <p class="text-gray-600">+234 80 2845 1192 (Calls Only)</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-sm">
                                <div class="w-12 h-12 gradient-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Email</h4>
                                    <p class="text-gray-600">fclmng2010@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 bg-white rounded-xl p-6 shadow-sm">
                                <div class="w-12 h-12 gradient-brand rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-2">Address</h4>
                                    <p class="text-gray-600">Permanent site address will be provided later</p>
                                </div>
                            </div>

                            <div class="gradient-brand-purple rounded-xl p-6 text-white">
                                <h4 class="font-bold mb-4">Follow Us On Social Media</h4>
                                <div class="flex space-x-4">
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-sm p-8 lg:p-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us A Message</h2>
                        <form class="space-y-6" onsubmit="handleContactForm(event)">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                                <input type="text" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all" placeholder="Your name">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all" placeholder="your@email.com">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                <input type="tel" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all" placeholder="+234">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Subject</label>
                                <input type="text" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all" placeholder="Message subject">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea required rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all resize-none" placeholder="Your message here..."></textarea>
                            </div>

                            <button type="submit" class="w-full gradient-brand text-white py-4 rounded-lg hover:shadow-sm transform hover:scale-105 transition-all font-semibold">
                                Send Message <i class="fas fa-paper-plane ml-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection