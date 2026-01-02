@extends('app')

@section('content')

    <!-- PROGRAMMES PAGE -->
    <div id="programmes" class="" style="margin-top: 80px;">
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4">Our Programmes</h1>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                    <p class="text-xl text-gray-600 mt-4">Discover opportunities for spiritual growth and service</p>
                </div>

                <!-- Firebrand Believer's Church -->
                <div id="fbc" class="bg-white rounded-3xl shadow-sm p-8 lg:p-12 mb-12">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 gradient-brand rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-church text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Firebrand Believer's Church (FBC)</h2>
                            <p class="text-gray-600">Our Church Community</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-8">
                        FBC is the church arm of the Ministry charged with making Christian disciples of all men who manifest love, compassion and the power of Almighty God. We provide an atmosphere where the rejected are accepted, the poor are empowered, and the broken-hearted are healed.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-red-50 rounded-xl p-6 border-l-4 border-brand-red">
                            <h4 class="font-bold text-gray-900 mb-2">School of Life</h4>
                            <p class="text-gray-600 text-sm mb-3">Wednesday • 5:00 - 6:30 PM</p>
                            <p class="text-gray-700 text-sm">Midweek Bible study and spiritual growth</p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 border-l-4 border-brand-blue">
                            <h4 class="font-bold text-gray-900 mb-2">Family Prayer Meeting</h4>
                            <p class="text-gray-600 text-sm mb-3">Saturday • 8:00 - 9:00 AM</p>
                            <p class="text-gray-700 text-sm">Corporate prayer for breakthrough</p>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 border-l-4 border-brand-green">
                            <h4 class="font-bold text-gray-900 mb-2">Sunday Worship</h4>
                            <p class="text-gray-600 text-sm mb-3">Sunday • 9:00 - 11:00 AM</p>
                            <p class="text-gray-700 text-sm">Main worship experience</p>
                        </div>
                    </div>
                </div>

                <!-- School of Ministry -->
                <div id="ministry" class="bg-white rounded-3xl shadow-sm p-8 lg:p-12 mb-12">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 gradient-brand-blue rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Firebrand School of Ministry</h2>
                            <p class="text-gray-600">Raising Christian Leaders</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-8">
                        A godly inspired school devoted to training purpose-driven leaders who will lead God's people to fulfill their end-time roles. Our programmes are carefully tailored towards producing visionary Christian leaders with godly character and integrity.
                    </p>

                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl p-6 border border-purple-200 card-hover">
                            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-white font-bold">BCF</span>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Basic Certificate</h4>
                            <p class="text-gray-600 text-sm mb-3">9 Weeks • Fridays 4:30-7:30pm</p>
                            <p class="text-gray-700 text-sm">Fundamental Christian faith teachings</p>
                        </div>

                        <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-200 card-hover">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-white font-bold">ICM</span>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Intermediate Certificate</h4>
                            <p class="text-gray-600 text-sm mb-3">Fridays 4:30-7:30pm</p>
                            <p class="text-gray-700 text-sm">Basic training for Christian workers</p>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-white rounded-xl p-6 border border-green-200 card-hover">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-white font-bold">ACM</span>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Advanced Certificate</h4>
                            <p class="text-gray-600 text-sm mb-3">9 Months • Saturdays</p>
                            <p class="text-gray-700 text-sm">Leadership in Christian ministry</p>
                        </div>

                        <div class="bg-gradient-to-br from-red-50 to-white rounded-xl p-6 border border-red-200 card-hover">
                            <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-4">
                                <span class="text-white font-bold">PCM</span>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-2">Professional Certificate</h4>
                            <p class="text-gray-600 text-sm mb-3">2 Years • Saturdays 10am-5pm</p>
                            <p class="text-gray-700 text-sm">Full ministry training & ordination</p>
                        </div>
                    </div>

                    <div class="mt-8 gradient-brand-blue text-white rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-xl mb-2">Virtual Campus Available</h4>
                                <p class="opacity-90">Study online at your own pace with live and recorded lectures</p>
                            </div>
                            <button class="bg-white text-brand-blue px-6 py-3 rounded-lg font-semibold hover:shadow-sm transition-all">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Community Outreach -->
                <div id="outreach" class="bg-white rounded-3xl shadow-sm p-8 lg:p-12">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 gradient-brand-green rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Firebrand Community Outreach</h2>
                            <p class="text-gray-600">Reaching Nations with the Gospel</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-8">
                        Our mandate is to reach out to the nations with the gospel of love and fellowship. We share the message of our Lord Jesus Christ with communities and people of all races through various outreach programs.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-yellow-50 rounded-xl p-6 text-center">
                            <i class="fas fa-city text-yellow-600 text-4xl mb-4"></i>
                            <h4 class="font-bold text-gray-900 mb-2">Inner City Mission</h4>
                            <p class="text-gray-700 text-sm">Reaching urban communities</p>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 text-center">
                            <i class="fas fa-mountain text-green-600 text-4xl mb-4"></i>
                            <h4 class="font-bold text-gray-900 mb-2">Rural Evangelism</h4>
                            <p class="text-gray-700 text-sm">Taking the gospel to villages</p>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-6 text-center">
                            <i class="fas fa-broadcast-tower text-blue-600 text-4xl mb-4"></i>
                            <h4 class="font-bold text-gray-900 mb-2">Media Outreach</h4>
                            <p class="text-gray-700 text-sm">Digital evangelism</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection