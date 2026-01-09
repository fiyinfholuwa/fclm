@extends('app')

@section('content')

    <!-- ABOUT PAGE -->
    <div id="about" class="" style="margin-top: 80px;">
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative text-center mb-16 bg-cover bg-center h-96" style="background-image: url('{{ asset('gallery/g1.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div> <!-- overlay -->
    <div class="relative z-10 flex flex-col justify-center h-full">
        <h1 class="text-5xl font-bold text-white mb-4">About FCLM</h1>
        <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
    </div>
</div>


                <div class="bg-white rounded-3xl shadow-sm p-8 lg:p-12 mb-12">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-6">
                            The Bible teaches according to Hebrews 10:25 and Matthew 28:19-20 (King James Version), the need to establish a fellowship of brethren for sound and balanced doctrinal teaching and edification, worship, evangelism and missionary outreaches, and preparation of believers and the world for the second coming of the Lord Jesus Christ.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            The <strong>Firebrand Christian Life Ministry</strong> began on the 25th April, 2010 as a response to meeting that need. Legal establishment took place on 13th May, 2019 after the ministry was duly registered with the Corporate Affairs Commission according to the Companies and Allied Matters Act No. 1 of 1990.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            As a Faith Based Organisation (FBO), the spiritual welfare and development of the people is our concern in line with the words of Jesus Christ in Matthew 5:16: <em>"Let your light so shine before men, that they may see your good works, and glorify your Father which is in heaven."</em>
                        </p>
                    </div>
                </div>

                <!-- Board of Trustees -->
                <div class="mb-16">
    <h2 class="text-4xl font-bold text-gray-900 mb-10 text-center">
        Board of Trustees
    </h2>

    <!-- Qualifications -->
    <div class="bg-white rounded-2xl shadow-sm p-8 mb-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">
            Qualifications of a Trustee
        </h3>

        <ul class="grid md:grid-cols-2 gap-5">
            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                <span class="text-gray-700">
                    A born again Christian with integrity, walking right with God
                </span>
            </li>

            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                <span class="text-gray-700">
                    Not less than 40 years old, with working knowledge of Holy Scriptures
                </span>
            </li>

            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                <span class="text-gray-700">
                    Suitably qualified educationally and not a novice
                </span>
            </li>

            <li class="flex items-start">
                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                <span class="text-gray-700">
                    Of good behaviour, given to hospitality, patient
                </span>
            </li>
        </ul>
    </div>

    <!-- Trustees -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
    src="{{ asset('team2.jpeg') }}" 
    alt="Prof. Adeyinka Sobowale"
    class="w-45 h-45 mx-auto rounded-full object-contain bg-gray-100 mb-4"
/>

            <h4 class="font-bold text-gray-900 mb-1">
                Prof. Adeyinka Sobowale
            </h4>
            <p class="text-brand-red font-semibold text-sm">
                Chairman
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
                src="{{ asset('team6.jpeg') }}" 
                alt="Deaconess Omolola Olugbemi"
                class="w-45 h-45 mx-auto rounded-full object-cover mb-4"
            >
            <h4 class="font-bold text-gray-900 mb-1">
                Deaconess Omolola Olugbemi
            </h4>
            <p class="text-brand-blue font-semibold text-sm">
                Member
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
                src="{{ asset('team.jpeg') }}" 
                alt="Elder Olufemi Sotubo"
                class="w-45 h-45 mx-auto rounded-full object-cover mb-4"
            >
            <h4 class="font-bold text-gray-900 mb-1">
                Elder Olufemi Sotubo
            </h4>
            <p class="text-brand-green font-semibold text-sm">
                Member
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
                src="{{ asset('team5.jpeg') }}" 
                alt="Mrs. Roseline Sobowale"
                class="w-45 h-45 mx-auto rounded-full object-cover mb-4"
            >
            <h4 class="font-bold text-gray-900 mb-1">
                Mrs. Roseline Sobowale
            </h4>
            <p class="text-brand-purple font-semibold text-sm">
                Member
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
                src="{{ asset('team3.jpeg') }}" 
                alt="Deacon Sunday Aluko"
                class="w-45 h-45 mx-auto rounded-full object-cover mb-4"
            >
            <h4 class="font-bold text-gray-900 mb-1">
                Deacon Sunday Aluko
            </h4>
            <p class="text-orange-600 font-semibold text-sm">
                Member / Secretary
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6 text-center card-hover">
            <img 
                src="{{ asset('team4.jpeg') }}" 
                alt="Pastor Adeniyi Sobowale"
                class="w-45 h-45 mx-auto rounded-full object-cover mb-4"
            >
            <h4 class="font-bold text-gray-900 mb-1">
                Pastor Adeniyi Sobowale
            </h4>
            <p class="text-indigo-600 font-semibold text-sm">
                Member
            </p>
        </div>
    </div>
</div>

            </div>
        </section>
    </div>
 @endsection