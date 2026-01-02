@extends('app')

@section('content')
<!-- PUBLICATIONS PAGE -->
<div id="publications" style="margin-top: 80px;">
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Publications & Resources</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-indigo-600 mx-auto rounded-full"></div>
                <p class="text-xl text-gray-600 mt-4">Access, read, and download free spiritual growth materials</p>
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

            <!-- Tracts & Magazines Section -->
            <div id="tracts-section" class="category-content">
                <div class="mb-8 flex justify-between items-center">
                    <h2 class="text-3xl font-bold text-gray-900">Tracts & Magazines</h2>
                    <div class="flex gap-2">
                        <button onclick="filterTracts('all')" class="filter-btn active px-4 py-2 rounded-lg bg-purple-100 text-purple-700 text-sm font-medium">All</button>
                        <button onclick="filterTracts('magazine')" class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Magazines</button>
                        <button onclick="filterTracts('tract')" class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Tracts</button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    // Demo PHP data - In real application, this would come from database
                    $tracts = [
                        [
                            'id' => 1,
                            'title' => 'The Path to Salvation',
                            'type' => 'tract',
                            'description' => 'A concise guide to understanding God\'s plan for salvation.',
                            'file_type' => 'PDF',
                            'file_size' => '2.4 MB',
                            'pages' => 12,
                            'downloads' => 245,
                            'thumbnail' => 'tract1.jpg',
                            'file_url' => '#'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Firebrand Monthly - January 2024',
                            'type' => 'magazine',
                            'description' => 'Monthly magazine featuring teachings, testimonies, and ministry updates.',
                            'file_type' => 'PDF',
                            'file_size' => '8.7 MB',
                            'pages' => 32,
                            'downloads' => 189,
                            'thumbnail' => 'magazine1.jpg',
                            'file_url' => '#'
                        ],
                        [
                            'id' => 3,
                            'title' => 'Overcoming Temptation',
                            'type' => 'tract',
                            'description' => 'Biblical strategies for resisting temptation and living victoriously.',
                            'file_type' => 'PDF',
                            'file_size' => '1.8 MB',
                            'pages' => 8,
                            'downloads' => 312,
                            'thumbnail' => 'tract2.jpg',
                            'file_url' => '#'
                        ],
                        [
                            'id' => 4,
                            'title' => 'Prayer Warrior\'s Guide',
                            'type' => 'tract',
                            'description' => 'Developing an effective prayer life and spiritual warfare.',
                            'file_type' => 'PDF',
                            'file_size' => '3.2 MB',
                            'pages' => 16,
                            'downloads' => 421,
                            'thumbnail' => 'tract3.jpg',
                            'file_url' => '#'
                        ],
                        [
                            'id' => 5,
                            'title' => 'Firebrand Monthly - February 2024',
                            'type' => 'magazine',
                            'description' => 'Love & Relationships special edition with practical biblical insights.',
                            'file_type' => 'PDF',
                            'file_size' => '9.1 MB',
                            'pages' => 36,
                            'downloads' => 156,
                            'thumbnail' => 'magazine2.jpg',
                            'file_url' => '#'
                        ],
                        [
                            'id' => 6,
                            'title' => 'Finding Peace in Christ',
                            'type' => 'tract',
                            'description' => 'Discovering inner peace through faith in Jesus Christ.',
                            'file_type' => 'PDF',
                            'file_size' => '2.1 MB',
                            'pages' => 10,
                            'downloads' => 278,
                            'thumbnail' => 'tract4.jpg',
                            'file_url' => '#'
                        ]
                    ];

                    foreach ($tracts as $tract):
                    ?>
                    <div class="tract-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover" data-type="<?php echo $tract['type']; ?>">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $tract['type'] === 'magazine' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'; ?>">
                                    <?php echo ucfirst($tract['type']); ?>
                                </span>
                                <span class="text-gray-500 text-sm"><?php echo $tract['file_type']; ?> • <?php echo $tract['file_size']; ?></span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo $tract['title']; ?></h3>
                            <p class="text-gray-600 mb-4 text-sm"><?php echo $tract['description']; ?></p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="fas fa-file-alt mr-1"></i> <?php echo $tract['pages']; ?> pages</span>
                                    <span><i class="fas fa-download mr-1"></i> <?php echo $tract['downloads']; ?> downloads</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <button onclick="viewPublication(<?php echo $tract['id']; ?>)" class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button onclick="downloadPublication(<?php echo $tract['id']; ?>)" class="flex-1 border border-purple-600 text-purple-600 py-2 rounded-lg hover:bg-purple-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-download"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Audio Messages Section -->
            <div id="audio-section" class="category-content hidden">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Audio Messages</h2>
                    <p class="text-gray-600 mt-2">Listen to inspiring sermons and teachings from our spiritual leaders</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $audioMessages = [
                        [
                            'id' => 1,
                            'title' => 'The Power of Faith',
                            'speaker' => 'Prof. Adeyinka Sobowale',
                            'duration' => '45:22',
                            'date' => 'March 15, 2024',
                            'plays' => 1245,
                            'file_url' => '#',
                            'thumbnail' => 'sermon1.jpg'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Walking in Victory',
                            'speaker' => 'Pastor Adeniyi Sobowale',
                            'duration' => '38:17',
                            'date' => 'March 8, 2024',
                            'plays' => 987,
                            'file_url' => '#',
                            'thumbnail' => 'sermon2.jpg'
                        ],
                        [
                            'id' => 3,
                            'title' => 'Overcoming Fear',
                            'speaker' => 'Prof. Adeyinka Sobowale',
                            'duration' => '52:45',
                            'date' => 'March 1, 2024',
                            'plays' => 1567,
                            'file_url' => '#',
                            'thumbnail' => 'sermon3.jpg'
                        ],
                        [
                            'id' => 4,
                            'title' => 'The Joy of Giving',
                            'speaker' => 'Deacon Sunday Aluko',
                            'duration' => '41:30',
                            'date' => 'February 23, 2024',
                            'plays' => 756,
                            'file_url' => '#',
                            'thumbnail' => 'sermon4.jpg'
                        ],
                        [
                            'id' => 5,
                            'title' => 'Building Strong Relationships',
                            'speaker' => 'Prof. Adeyinka Sobowale',
                            'duration' => '47:12',
                            'date' => 'February 16, 2024',
                            'plays' => 892,
                            'file_url' => '#',
                            'thumbnail' => 'sermon5.jpg'
                        ],
                        [
                            'id' => 6,
                            'title' => 'Prayer That Moves Mountains',
                            'speaker' => 'Elder Olufemi Sotubo',
                            'duration' => '39:55',
                            'date' => 'February 9, 2024',
                            'plays' => 1123,
                            'file_url' => '#',
                            'thumbnail' => 'sermon6.jpg'
                        ]
                    ];

                    foreach ($audioMessages as $audio):
                    ?>
                    <div class="audio-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    Audio Sermon
                                </span>
                                <span class="text-gray-500 text-sm"><?php echo $audio['duration']; ?></span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo $audio['title']; ?></h3>
                            <p class="text-gray-600 mb-4 text-sm">By <?php echo $audio['speaker']; ?></p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="far fa-calendar-alt mr-1"></i> <?php echo $audio['date']; ?></span>
                                    <span><i class="fas fa-headphones mr-1"></i> <?php echo number_format($audio['plays']); ?> plays</span>
                                </div>
                            </div>
                            
                            <!-- Audio Player Demo -->
                            <div class="mb-6 bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-3">
                                        <button class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white hover:bg-purple-700 transition-all">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <div class="text-sm">
                                            <div class="font-medium">Now Playing</div>
                                            <div class="text-gray-500">00:00 / <?php echo $audio['duration']; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-purple-600 h-1.5 rounded-full" style="width: 30%"></div>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <button onclick="playAudio(<?php echo $audio['id']; ?>)" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-play-circle"></i> Play
                                </button>
                                <button onclick="downloadAudio(<?php echo $audio['id']; ?>)" class="flex-1 border border-blue-600 text-blue-600 py-2 rounded-lg hover:bg-blue-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-download"></i> Download MP3
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Other Resources Section -->
            <div id="resources-section" class="category-content hidden">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Other Resources</h2>
                    <p class="text-gray-600 mt-2">Access study guides, devotionals and other materials for spiritual growth</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $resources = [
                        [
                            'id' => 1,
                            'title' => '30-Day Devotional Guide',
                            'type' => 'Devotional',
                            'format' => 'PDF',
                            'description' => 'Daily devotional guide for spiritual growth and reflection.',
                            'pages' => 60,
                            'file_url' => '#'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Bible Study Workbook',
                            'type' => 'Workbook',
                            'format' => 'PDF',
                            'description' => 'Interactive workbook for group or personal Bible study.',
                            'pages' => 85,
                            'file_url' => '#'
                        ],
                        [
                            'id' => 3,
                            'title' => 'Leadership Training Manual',
                            'type' => 'Manual',
                            'format' => 'PDF',
                            'description' => 'Comprehensive manual for Christian leadership development.',
                            'pages' => 120,
                            'file_url' => '#'
                        ],
                        [
                            'id' => 4,
                            'title' => 'Prayer Journal Template',
                            'type' => 'Template',
                            'format' => 'DOCX',
                            'description' => 'Printable prayer journal template for daily use.',
                            'pages' => 24,
                            'file_url' => '#'
                        ],
                        [
                            'id' => 5,
                            'title' => 'Children\'s Bible Activities',
                            'type' => 'Activity Book',
                            'format' => 'PDF',
                            'description' => 'Fun and educational Bible activities for children.',
                            'pages' => 48,
                            'file_url' => '#'
                        ],
                        [
                            'id' => 6,
                            'title' => 'Marriage Enrichment Guide',
                            'type' => 'Guide',
                            'format' => 'PDF',
                            'description' => 'Biblical principles for strengthening marriages.',
                            'pages' => 72,
                            'file_url' => '#'
                        ]
                    ];

                    foreach ($resources as $resource):
                    ?>
                    <div class="resource-item bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <?php echo $resource['type']; ?>
                                </span>
                                <span class="text-gray-500 text-sm"><?php echo $resource['format']; ?></span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo $resource['title']; ?></h3>
                            <p class="text-gray-600 mb-4 text-sm"><?php echo $resource['description']; ?></p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <div class="flex items-center gap-4">
                                    <span><i class="fas fa-file-alt mr-1"></i> <?php echo $resource['pages']; ?> pages</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <button onclick="previewResource(<?php echo $resource['id']; ?>)" class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                                <button onclick="downloadResource(<?php echo $resource['id']; ?>)" class="flex-1 border border-green-600 text-green-600 py-2 rounded-lg hover:bg-green-50 transition-all font-medium flex items-center justify-center gap-2">
                                    <i class="fas fa-download"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                <div class="w-64 h-80 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl mb-6 flex items-center justify-center">
                    <i class="fas fa-book-open text-purple-600 text-8xl"></i>
                </div>
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
// Publication data (in real app, this would come from backend)
const publications = {
    1: {
        title: "The Path to Salvation",
        content: "<h2>The Path to Salvation</h2><p>Salvation is the greatest gift that God has given to mankind. Through faith in Jesus Christ, we receive forgiveness of sins and eternal life.</p><p>Romans 10:9 says, 'If you declare with your mouth, Jesus is Lord, and believe in your heart that God raised him from the dead, you will be saved.'</p><h3>Steps to Salvation:</h3><ol><li>Recognize that you are a sinner</li><li>Believe that Jesus died for your sins</li><li>Confess Jesus as your Lord and Savior</li><li>Commit to following Him daily</li></ol>",
        info: "PDF • 12 pages • 2.4 MB"
    },
    2: {
        title: "Firebrand Monthly - January 2024",
        content: "<h2>Firebrand Monthly</h2><h3>January 2024 Edition</h3><p>Welcome to the January edition of Firebrand Monthly! This month, we focus on 'New Beginnings in Christ.'</p><h4>Featured Articles:</h4><ul><li>Starting the Year with God</li><li>Breaking Bad Habits through Faith</li><li>Testimonies from Our Community</li><li>Upcoming Events Calendar</li></ul>",
        info: "PDF • 32 pages • 8.7 MB"
    }
    // Add more publications as needed
};

// Category switching
function showCategory(category) {
    // Update tabs
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.classList.remove('active');
        tab.classList.remove('bg-purple-600', 'text-white');
        tab.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
    });
    
    event.target.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
    event.target.classList.add('active', 'bg-purple-600', 'text-white');
    
    // Show selected category
    document.querySelectorAll('.category-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    document.getElementById(category + '-section').classList.remove('hidden');
}

// Filter tracts
function filterTracts(type) {
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-purple-100', 'text-purple-700');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    event.target.classList.remove('bg-gray-100', 'text-gray-700');
    event.target.classList.add('active', 'bg-purple-100', 'text-purple-700');
    
    const tracts = document.querySelectorAll('.tract-item');
    tracts.forEach(tract => {
        if (type === 'all' || tract.dataset.type === type) {
            tract.style.display = 'block';
            tract.style.animation = 'fadeInUp 0.6s ease forwards';
        } else {
            tract.style.display = 'none';
        }
    });
}

// View publication
function viewPublication(id) {
    const pub = publications[id];
    if (!pub) {
        alert('Publication details not available');
        return;
    }
    
    document.getElementById('modalTitle').textContent = pub.title;
    document.getElementById('modalContent').innerHTML = pub.content;
    document.getElementById('modalInfo').textContent = pub.info;
    
    // Set download button
    const downloadBtn = document.getElementById('modalDownloadBtn');
    downloadBtn.onclick = () => downloadPublication(id);
    
    // Show modal
    document.getElementById('publicationModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    document.getElementById('publicationModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Download publication
function downloadPublication(id) {
    // In real app, this would trigger file download
    alert('Downloading publication... This would start file download in production.');
    // Increment download count in database
    console.log('Downloaded publication ID:', id);
}

// Play audio
function playAudio(id) {
    alert('Playing audio message... In production, this would start audio playback.');
    console.log('Playing audio ID:', id);
}

// Download audio
function downloadAudio(id) {
    alert('Downloading audio message... This would download MP3 file in production.');
    console.log('Downloaded audio ID:', id);
}

// Preview resource
function previewResource(id) {
    alert('Previewing resource... In production, this would open resource viewer.');
    console.log('Preview resource ID:', id);
}

// Download resource
function downloadResource(id) {
    alert('Downloading resource... This would start file download in production.');
    console.log('Downloaded resource ID:', id);
}

// Initialize animations on page load
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.tract-item, .audio-item, .resource-item');
    items.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>
@endsection