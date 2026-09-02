@extends('app')

@section('content')
<div style="margin-top: 80px;">
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <span class="inline-flex items-center rounded-full bg-orange-100 px-4 py-1.5 text-sm font-semibold text-orange-700 mb-5"><i class="fas fa-camera mr-2"></i> Our memories</span>
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Photo Gallery</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-red-600 mx-auto rounded-full"></div>
                <p class="text-xl text-gray-600 mt-4">Moments of faith, fellowship, and ministry</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @forelse ($galleryImages as $image)
                    @php($url = asset($image->image_path))
                    <button type="button" class="overflow-hidden rounded-xl group text-left" onclick="openLightbox('{{ $url }}', @js($image->title ?: 'Ministry Gallery Image'))">
                        <img src="{{ $url }}" alt="{{ $image->title ?: 'Ministry Gallery Image' }}" class="w-full aspect-[4/3] object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    </button>
                @empty
                    <p class="col-span-full text-center text-gray-600">No gallery images have been added yet.</p>
                @endforelse
            </div>
            <div class="mt-12 text-center text-gray-600">{{ $galleryImages->count() }} Precious Moments Captured</div>
        </div>
    </section>
</div>

<div id="lightbox" class="hidden fixed inset-0 z-50 bg-black/90 p-6 items-center justify-center" onclick="closeLightbox()">
    <img id="lightbox-image" class="max-h-full max-w-full object-contain" alt="">
</div>
<script>
function openLightbox(url, title) {
    const modal = document.getElementById('lightbox');
    document.getElementById('lightbox-image').src = url;
    document.getElementById('lightbox-image').alt = title;
    modal.classList.remove('hidden'); modal.classList.add('flex');
}
function closeLightbox() { const modal = document.getElementById('lightbox'); modal.classList.add('hidden'); modal.classList.remove('flex'); }
</script>
@endsection
