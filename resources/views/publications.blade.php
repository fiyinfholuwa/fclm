@extends('app')

@section('content')

@php
    $publications = $publications ?? collect();
@endphp

<!-- PUBLICATIONS PAGE -->
<div id="publications" style="margin-top: 80px;">
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header with background image -->
            <div class="page-header relative text-center mb-16">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="relative z-10 flex flex-col justify-center h-full">
                    <h1 class="text-5xl font-bold text-gray-900 mb-4 text-white">Publications & Resources</h1>
                    <div class="w-24 h-1 gradient-brand mx-auto rounded-full"></div>
                    <p class="text-xl text-gray-600 mt-4 text-white">Access, read, and download free spiritual growth materials</p>        
                </div>
            </div>
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button onclick="showCategory('tracts')" class="category-tab active px-6 py-3 rounded-full font-semibold transition-all bg-purple-600 text-white">
                    Tracts & Magazines
                </button>
                <button onclick="showCategory('audio')" class="category-tab px-6 py-3 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Audio Messages
                </button>
                <button onclick="showCategory('resources')" class="category-tab px-6 py-3 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                    Other Resources
                </button>
            </div>

            <!-- Tracts & Magazines Section (category: tract) -->
            <div id="tracts-section" class="category-content">
                <div class="mb-8 flex justify-between items-center">
                    <h2 class="text-3xl font-bold text-gray-900">Tracts & Magazines</h2>
                    <!-- Simple filter for tracts (only one type here) -->
                    <div class="flex gap-2">
                        <button onclick="filterTracts('all')" class="filter-btn active px-4 py-2 rounded-lg bg-purple-100 text-purple-700 text-sm font-medium">All</button>
                        <button onclick="filterTracts('tract')" class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Tracts</button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($publications->where('category', 'tract') as $publication)
                    <div class="tract-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover" data-type="tract">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    Tract
                                </span>
                                <span class="text-gray-500 text-sm">PDF</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $publication->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm">{{ $publication->description }}</p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="fas fa-user mr-1"></i> {{ $publication->author }}</span>
                                    {{-- <span><i class="fas fa-download mr-1"></i> {{ $publication->download_count }} downloads</span> --}}
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <button onclick="viewPublication({{ $publication->id }})" class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button onclick="downloadPublication('{{ $publication->file_path }}', '{{ $publication->title }}')" class="flex-1 border border-purple-600 text-purple-600 py-2 rounded-lg hover:bg-purple-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-download"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Audio Messages Section (category: audio) -->
            <div id="audio-section" class="category-content hidden">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Audio Messages</h2>
                    <p class="text-gray-600 mt-2">Listen to inspiring sermons and teachings from our spiritual leaders</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($publications->where('category', 'audio') as $publication)
                    <div class="audio-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    Audio Sermon
                                </span>
                                <span class="text-gray-500 text-sm">External Link</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $publication->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm">By {{ $publication->author }}</p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($publication->publication_date)->format('M d, Y') }}</span>
                                    {{-- <span><i class="fas fa-download mr-1"></i> {{ $publication->download_count }} downloads</span> --}}
                                </div>
                            </div>
                            
                            <!-- Simple audio player placeholder (could embed if direct file) -->
                            <div class="mb-6 bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ $publication->link }}" target="_blank" class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white hover:bg-purple-700 transition-all">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        <div class="text-sm">
                                            <div class="font-medium">Listen on Google Drive</div>
                                            <div class="text-gray-500">Click play to open</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <a href="{{ $publication->link }}" target="_blank" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-play-circle"></i> Play
                                </a>
                                <button onclick="window.open('{{ $publication->link }}', '_blank')" class="flex-1 border border-blue-600 text-blue-600 py-2 rounded-lg hover:bg-blue-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-external-link-alt"></i> Open Link
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Other Resources Section (category: devotional) -->
            <div id="resources-section" class="category-content hidden">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Other Resources</h2>
                    <p class="text-gray-600 mt-2">Access study guides, devotionals and other materials for spiritual growth</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($publications->where('category', 'devotional') as $publication)
                    <div class="resource-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    Devotional
                                </span>
                                <span class="text-gray-500 text-sm">PDF</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $publication->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm">{{ $publication->description }}</p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="fas fa-user mr-1"></i> {{ $publication->author }}</span>
                                    {{-- <span><i class="fas fa-download mr-1"></i> {{ $publication->download_count }} downloads</span> --}}
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <button onclick="viewPublication({{ $publication->id }})" class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button onclick="downloadPublication('{{ $publication->file_path }}', '{{ $publication->title }}')" class="flex-1 border border-green-600 text-green-600 py-2 rounded-lg hover:bg-green-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-download"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Publication Viewer Modal -->
<div id="publicationModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden">
        <div class="flex justify-between items-center p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-900">Reading: <span id="modalTitle"></span></h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto max-h-[70vh]">
            <div class="flex flex-col items-center">
                <!-- Thumbnail will be dynamically added by JavaScript -->
                <div id="modalThumbnail" class="mb-6"></div>
                <div id="modalContent" class="prose max-w-none">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center p-6 border-t border-gray-200">
            <div class="text-gray-600">
                <span id="modalInfo"></span>
            </div>
            <div class="flex gap-3">
                <button id="modalDownloadBtn" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all font-medium flex items-center gap-2">
                    <i class="fas fa-download"></i> Download PDF
                </button>
                <button onclick="closeModal()" class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition-all font-medium">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.category-content {
    display: block;
}
.category-content.hidden {
    display: none;
}
.category-tab {
    transition: all 0.3s ease;
}
.category-tab.active {
    background: linear-gradient(135deg, #8b5cf6, #6366f1);
    color: white;
}
.filter-btn.active {
    background-color: #8b5cf6;
    color: white;
}
.card-hover {
    transition: all 0.3s ease;
}
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(139, 92, 246, 0.1);
}
.tract-item, .audio-item, .resource-item {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Pass Laravel publications to JavaScript
const publicationsData = @json($publications);

// Category switching
function showCategory(category) {
    // Update tabs
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.classList.remove('active', 'bg-purple-600', 'text-white');
        tab.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
    });
    
    // Style the clicked tab
    event.target.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
    event.target.classList.add('active', 'bg-purple-600', 'text-white');
    
    // Show selected category
    document.querySelectorAll('.category-content').forEach(content => {
        content.classList.add('hidden');
    });
    document.getElementById(category + '-section').classList.remove('hidden');
}

// Filter tracts (simplified for single type)
function filterTracts(type) {
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-purple-100', 'text-purple-700');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    event.target.classList.remove('bg-gray-100', 'text-gray-700');
    event.target.classList.add('active', 'bg-purple-100', 'text-purple-700');
    
    // Since we only have 'tract' type, showing all is the same
    const tracts = document.querySelectorAll('.tract-item');
    tracts.forEach(tract => {
        tract.style.display = 'block';
    });
}

// View publication - open modal with details
function viewPublication(id) {
    const publication = publicationsData.find(p => p.id === id);
    if (!publication) {
        alert('Publication not found');
        return;
    }
    
    document.getElementById('modalTitle').textContent = publication.title;
    
    // Build thumbnail HTML
    const thumbnailDiv = document.getElementById('modalThumbnail');
    if (publication.thumbnail_path) {
        thumbnailDiv.innerHTML = `<img src="/storage/${publication.thumbnail_path}" alt="Thumbnail" class="w-64 h-80 object-cover rounded-xl mb-6">`;
    } else {
        thumbnailDiv.innerHTML = `<div class="w-64 h-80 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl mb-6 flex items-center justify-center">
            <i class="fas fa-book-open text-purple-600 text-8xl"></i>
        </div>`;
    }
    
    // Build modal content
    let content = `<h2 class="text-2xl font-bold mb-4">${publication.title}</h2>`;
    content += `<p class="text-gray-700 mb-4"><strong>Author:</strong> ${publication.author}</p>`;
    content += `<p class="text-gray-700 mb-4"><strong>Description:</strong> ${publication.description}</p>`;
    content += `<p class="text-gray-700 mb-4"><strong>Category:</strong> ${publication.category}</p>`;
    content += `<p class="text-gray-700 mb-4"><strong>Published:</strong> ${new Date(publication.publication_date).toLocaleDateString()}</p>`;
    content += `<p class="text-gray-700 mb-4"><strong>Downloads:</strong> ${publication.download_count}</p>`;
    
    if (publication.file_path) {
        content += `<p class="text-green-600"><i class="fas fa-check-circle"></i> PDF available</p>`;
    } else if (publication.link) {
        content += `<p class="text-blue-600"><i class="fas fa-external-link-alt"></i> External link: <a href="${publication.link}" target="_blank" class="underline">${publication.link}</a></p>`;
    }
    
    document.getElementById('modalContent').innerHTML = content;
    document.getElementById('modalInfo').innerHTML = `PDF • ${publication.author}`;
    
    // Set download button action
    const downloadBtn = document.getElementById('modalDownloadBtn');
    if (publication.file_path) {
        downloadBtn.onclick = () => downloadPublication(publication.file_path, publication.title);
        downloadBtn.disabled = false;
        downloadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        downloadBtn.onclick = () => alert('No PDF available for download. Use the external link.');
        downloadBtn.disabled = true;
        downloadBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
    
    // Show modal
    document.getElementById('publicationModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    document.getElementById('publicationModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Download publication (file)
function downloadPublication(filePath, title) {
    if (!filePath) {
        alert('No file available for download');
        return;
    }
    
    // Create a temporary anchor and trigger download
    const link = document.createElement('a');
    link.href = `/storage/${filePath}`; // Adjust path as needed
    link.download = title + '.pdf'; // Suggest filename
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    // Optional: increment download count via AJAX (can be implemented later)
    console.log('Downloaded:', title);
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.tract-item, .audio-item, .resource-item');
    items.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>
@endsection
