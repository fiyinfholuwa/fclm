@extends('app')

@section('content')
<!-- GALLERY PAGE -->
<div id="gallery" style="margin-top: 80px;">
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Photo Gallery</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-red-600 mx-auto rounded-full"></div>
                <p class="text-xl text-gray-600 mt-4">Moments of faith, fellowship, and ministry</p>
            </div>

            <!-- Gallery Grid - Simple and Clean -->
            <div class="gallery-grid grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <?php
                // Generate gallery items from g1 to g23
                for ($i = 1; $i <= 23; $i++):
                ?>
                <div class="gallery-item overflow-hidden rounded-xl group animate-fade-in" 
                     style="animation-delay: <?php echo ($i % 12) * 0.1; ?>s">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-orange-50 to-red-50">
                        <!-- Image -->
                        <img src="{{ asset("gallery/g$i.png") }}" 
                             alt="Ministry Gallery Image {{ $i }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"400\" height=\"300\" viewBox=\"0 0 400 300\"><defs><linearGradient id=\"grad\" x1=\"0%\" y1=\"0%\" x2=\"100%\" y2=\"100%\"><stop offset=\"0%\" style=\"stop-color:#fb923c;stop-opacity:0.1\"/><stop offset=\"100%\" style=\"stop-color:#dc2626;stop-opacity:0.1\"/></linearGradient></defs><rect width=\"400\" height=\"300\" fill=\"url(#grad)\"/><circle cx=\"200\" cy=\"150\" r=\"50\" fill=\"%23f97316\" opacity=\"0.3\"/><circle cx=\"200\" cy=\"150\" r=\"30\" fill=\"%23ea580c\" opacity=\"0.5\"/></svg>';">
                        
                        <!-- Overlay with View Button -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <button onclick="openLightbox('g{{ $i }}')" 
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-orange-600 transform scale-0 group-hover:scale-100 transition-all duration-500 hover:scale-110 hover:bg-white">
                                <i class="fas fa-expand text-xl"></i>
                            </button>
                        </div>
                        
                        <!-- Image Number -->
                        <div class="absolute top-3 right-3 bg-black/50 text-white text-xs font-semibold px-2 py-1 rounded-full backdrop-blur-sm">
                            {{ $i }}/23
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>

            <!-- Image Counter -->
            <div class="mt-12 text-center">
                <div class="inline-flex items-center gap-4 bg-gradient-to-r from-orange-500/10 to-red-500/10 px-8 py-4 rounded-full">
                    <div class="text-3xl font-bold text-orange-600">23</div>
                    <div class="text-gray-600">Precious Moments Captured</div>
                    <div class="hidden sm:block">
                        <i class="fas fa-heart text-red-500 animate-pulse"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Lightbox Modal -->
<div id="lightboxModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
    <div class="relative w-full max-w-5xl max-h-[90vh]">
        <!-- Close Button -->
        <button onclick="closeLightbox()" 
                class="absolute -top-14 right-0 md:right-4 md:top-4 z-20 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300 hover:rotate-90">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <!-- Navigation Buttons -->
        <button onclick="prevImage()" 
                class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 md:left-4">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextImage()" 
                class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 md:right-4">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <!-- Main Image Container -->
        <div class="relative bg-transparent rounded-2xl overflow-hidden">
            <!-- Image -->
            <img id="lightboxImage" 
                 src="" 
                 alt="" 
                 class="w-full h-[70vh] object-contain rounded-lg"
                 loading="eager">
            
            <!-- Loading Spinner -->
            <div id="imageLoading" class="absolute inset-0 flex items-center justify-center bg-black/50">
                <div class="w-16 h-16 border-4 border-orange-500 border-t-transparent rounded-full animate-spin"></div>
            </div>
            
            <!-- Image Counter -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-4 py-2 rounded-full backdrop-blur-sm text-sm font-medium">
                <span id="imageCounter">1 / 23</span>
            </div>
        </div>
        
        <!-- Thumbnail Strip -->
        <div class="mt-4 overflow-x-auto pb-2">
            <div class="flex gap-2 w-max mx-auto px-2">
                <?php for ($i = 1; $i <= 23; $i++): ?>
                <button onclick="goToImage(<?php echo $i; ?>)" 
                        class="thumbnail flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-orange-500 transition-all duration-300 focus:border-orange-500">
                    <img src="{{ asset("gallery/g$i.png") }}" 
                         alt="Thumbnail {{ $i }}"
                         class="w-full h-full object-cover">
                </button>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Animations */
@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

.animate-fade-in {
    opacity: 0;
    animation: fadeIn 0.6s ease-out forwards;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Gallery Image Styling */
.gallery-item {
    perspective: 1000px;
}

.gallery-item img {
    will-change: transform;
    transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

.gallery-item:hover img {
    transform: scale(1.15) rotate(1deg);
}

/* Lightbox Thumbnails */
.thumbnail.active {
    border-color: #f97316;
    transform: scale(1.1);
    box-shadow: 0 0 20px rgba(249, 115, 22, 0.3);
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    height: 6px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #f97316, #dc2626);
    border-radius: 3px;
}

/* Shimmer Loading Effect */
.shimmer {
    background: linear-gradient(90deg, 
        rgba(255, 255, 255, 0) 0%, 
        rgba(255, 255, 255, 0.4) 50%, 
        rgba(255, 255, 255, 0) 100%);
    background-size: 1000px 100%;
    animation: shimmer 2s infinite;
}

/* Responsive Grid Adjustments */
@media (max-width: 768px) {
    .gallery-grid {
        gap: 2px;
    }
    
    .gallery-item {
        border-radius: 8px;
    }
}
</style>

<script>
// Gallery Configuration
const totalImages = 23;
let currentImage = 1;
let isLightboxOpen = false;

// Preload images for smoother lightbox experience
function preloadImages() {
    for (let i = 1; i <= Math.min(5, totalImages); i++) {
        const img = new Image();
        img.src = `/gallery/g${i}.png`;
    }
}

// Open Lightbox
function openLightbox(imageId) {
    const imageNum = parseInt(imageId.replace('g', ''));
    currentImage = imageNum;
    isLightboxOpen = true;
    
    // Show loading
    document.getElementById('imageLoading').classList.remove('hidden');
    
    // Load image
    const lightboxImage = document.getElementById('lightboxImage');
    lightboxImage.onload = () => {
        document.getElementById('imageLoading').classList.add('hidden');
        lightboxImage.classList.add('loaded');
    };
    
    lightboxImage.src = `/gallery/g${imageNum}.png`;
    lightboxImage.alt = `Ministry Gallery Image ${imageNum}`;
    
    // Update counter
    document.getElementById('imageCounter').textContent = `${imageNum} / ${totalImages}`;
    
    // Update active thumbnail
    updateThumbnails();
    
    // Show modal
    document.getElementById('lightboxModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Add keyboard event listeners
    document.addEventListener('keydown', handleKeydown);
}

// Update Thumbnails
function updateThumbnails() {
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    
    const activeThumb = document.querySelector(`.thumbnail:nth-child(${currentImage})`);
    if (activeThumb) {
        activeThumb.classList.add('active');
        
        // Scroll thumbnail into view
        activeThumb.scrollIntoView({
            behavior: 'smooth',
            inline: 'center',
            block: 'nearest'
        });
    }
}

// Navigate Images
function nextImage() {
    currentImage = currentImage >= totalImages ? 1 : currentImage + 1;
    openLightbox(`g${currentImage}`);
}

function prevImage() {
    currentImage = currentImage <= 1 ? totalImages : currentImage - 1;
    openLightbox(`g${currentImage}`);
}

function goToImage(num) {
    currentImage = num;
    openLightbox(`g${currentImage}`);
}

// Close Lightbox
function closeLightbox() {
    document.getElementById('lightboxModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    isLightboxOpen = false;
    
    // Remove keyboard event listeners
    document.removeEventListener('keydown', handleKeydown);
}

// Keyboard Navigation
function handleKeydown(e) {
    if (!isLightboxOpen) return;
    
    switch(e.key) {
        case 'Escape':
            closeLightbox();
            break;
        case 'ArrowLeft':
            prevImage();
            break;
        case 'ArrowRight':
            nextImage();
            break;
        case ' ':
            e.preventDefault();
            nextImage();
            break;
    }
}

// Swipe support for mobile
let touchStartX = 0;
let touchEndX = 0;

document.getElementById('lightboxImage').addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

document.getElementById('lightboxImage').addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const swipeDistance = touchEndX - touchStartX;
    
    if (Math.abs(swipeDistance) > swipeThreshold) {
        if (swipeDistance > 0) {
            prevImage(); // Swipe right
        } else {
            nextImage(); // Swipe left
        }
    }
}

// Image Loading Animation
function animateGalleryItems() {
    const items = document.querySelectorAll('.gallery-item');
    items.forEach((item, index) => {
        // Stagger animation
        item.style.animationDelay = `${(index % 12) * 0.1}s`;
        
        // Add hover effect
        item.addEventListener('mouseenter', () => {
            item.style.zIndex = '10';
        });
        
        item.addEventListener('mouseleave', () => {
            item.style.zIndex = '1';
        });
    });
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    // Preload first few images
    preloadImages();
    
    // Animate gallery items
    animateGalleryItems();
    
    // Add subtle floating animation to hero
    const heroSection = document.querySelector('.text-center');
    heroSection.classList.add('animate-float');
    
    // Lazy load images as they come into view
    if ('IntersectionObserver' in window) {
        const lazyImageObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    lazyImageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach((img) => {
            lazyImageObserver.observe(img);
        });
    }
});

// Easter egg: Double click on any image to add heart animation
document.addEventListener('dblclick', function(e) {
    if (e.target.tagName === 'IMG' && e.target.closest('.gallery-item')) {
        const heart = document.createElement('div');
        heart.innerHTML = '❤️';
        heart.className = 'absolute text-2xl animate-float';
        heart.style.left = `${e.clientX - e.target.getBoundingClientRect().left}px`;
        heart.style.top = `${e.clientY - e.target.getBoundingClientRect().top}px`;
        heart.style.pointerEvents = 'none';
        
        e.target.parentElement.appendChild(heart);
        
        // Remove heart after animation
        setTimeout(() => {
            heart.remove();
        }, 3000);
    }
});
</script>
@endsection