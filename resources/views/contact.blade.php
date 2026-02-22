@extends('app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- CONTACT PAGE -->
    <div id="contact" class="" style="margin-top: 80px;">
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

             <div class="relative text-center mb-16 bg-cover bg-center h-96" style="background-image: url('{{ asset('https://www.shutterstock.com/image-photo/contact-us-concept-woman-hand-600nw-2202135989.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div> <!-- overlay -->
    <div class="relative z-10 flex flex-col justify-center h-full">
<h1 class="text-5xl font-bold text-gray-900 mb-4 text-white">Contact Us</h1>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                    <p class="text-xl text-gray-600 mt-4 text-white">We'd love to hear from you</p>        
                    {{-- <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div> --}}
    </div>
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
                                    <p class="text-gray-600">Firebrand Believers Church (Beulah Centre)
Plot 9, Sanni Street off Aregbe Road, Aregbesola Area, Abeokuta, Ogun State, Nigeria</p>
                                </div>
                            </div>

                            <div class="gradient-brand-purple rounded-xl p-6 text-white">
                                <h4 class="font-bold mb-4">Follow Us On Social Media</h4>
                                <div class="flex space-x-4">
                                    <a  target="_blank" href="https://web.facebook.com/fclmng" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    
                      
                                    <a target="_blank" href="https://x.com/firebrandac" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
<i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                    <a target="_blank" href="https://www.instagram.com/fclmng?igsh=ZG9ndnAwbzlqYWhv" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="bg-white rounded-3xl shadow-sm p-8 lg:p-12">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us A Message</h2>

    <form class="space-y-6" onsubmit="handleContactForm(event)">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Full Name</label>
            <input name="full_name" type="text" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all"
                placeholder="Your name">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Email Address</label>
            <input name="email" type="email" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all"
                placeholder="your@email.com">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input name="phone" type="tel" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all"
                placeholder="+234">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Subject</label>
            <input name="subject" type="text" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all"
                placeholder="Message subject">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea name="message" rows="5" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all resize-none"
                placeholder="Your message here..."></textarea>
        </div>

        <button type="submit" id="contactBtn"
            class="w-full gradient-brand text-white py-4 rounded-lg transition-all font-semibold flex items-center justify-center gap-3">
            <span id="btnText">Send Message</span>
            <span id="btnSpinner" class="hidden loader"></span>
        </button>
    </form>
</div>

<!-- TOAST -->
<div id="toast"
     class="fixed top-6 right-6 z-50 hidden px-6 py-4 rounded-lg shadow-lg text-white text-sm">
</div>
<style>
.loader {
    width: 18px;
    height: 18px;
    border: 3px solid rgba(255,255,255,0.4);
    border-top: 3px solid #fff;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.toast-success { background-color: #16a34a; }
.toast-error { background-color: #dc2626; }
</style>
                </div>
            </div>
        </section>
    </div>


<script>
function handleContactForm(e) {
    e.preventDefault();

    const form = e.target;
    const btn = document.getElementById('contactBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('btnSpinner');

    btn.disabled = true;
    btnText.textContent = 'Sending...';
    spinner.classList.remove('hidden');

    const data = new FormData(form);

    fetch('/save/contact', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: data
    })
    .then(res => res.json())
    .then(res => {
        if (res.status) {
            showToast(res.message, true);
            form.reset();
        } else {
            showToast(res.message ?? 'Something went wrong', false);
        }
    })
    .catch(() => {
        showToast('Network error. Please try again.', false);
    })
    .finally(() => {
        btn.disabled = false;
        btnText.textContent = 'Send Message';
        spinner.classList.add('hidden');
    });
}

function showToast(message, success = true) {
    const toast = document.getElementById('toast');
    toast.textContent = message;

    toast.className = `fixed top-6 right-6 z-50 px-6 py-4 rounded-lg shadow-lg text-white text-sm ${
        success ? 'toast-success' : 'toast-error'
    }`;

    toast.classList.remove('hidden');

    setTimeout(() => {
        toast.classList.add('hidden');
    }, 4000);
}
</script>
 @endsection