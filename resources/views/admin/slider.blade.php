@extends('admin.app')

@section('content')

<style>
/* admin.css or style section */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

.file-upload-area {
    border: 2px dashed #ddd;
    border-radius: 8px;
    padding: 40px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s;
}

.file-upload-area:hover,
.file-upload-area.dragover {
    border-color: #4f46e5;
}

.file-upload-area i {
    font-size: 48px;
    color: #888;
    margin-bottom: 10px;
}

.uploaded-files {
    margin-top: 20px;
}

.file-preview {
    position: relative;
    display: inline-block;
    margin: 10px;
}

.file-preview img {
    width: 150px;
    height: 100px;
    object-fit: cover;
    border-radius: 4px;
}

.remove-file {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    cursor: pointer;
}

.tab-nav {
    display: flex;
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px;
}

.tab-btn {
    padding: 10px 20px;
    background: none;
    border: none;
    border-bottom: 3px solid transparent;
    cursor: pointer;
}

.tab-btn.active {
    border-bottom-color: #4f46e5;
    color: #4f46e5;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.image-preview {
    max-width: 200px;
    max-height: 150px;
    display: none;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.status-badge.active {
    background-color: #dcfce7;
    color: #166534;
}

.status-badge.inactive {
    background-color: #fee2e2;
    color: #991b1b;
}

.table-image img {
    width: 80px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.btn-icon {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-icon:hover {
    opacity: 0.8;
}

.btn-primary {
    background-color: #4f46e5;
    color: white;
}

.btn-secondary {
    background-color: #6b7280;
    color: white;
}

.form-row {
    display: flex;
    gap: 20px;
}

.form-group {
    flex: 1;
}
</style>

            <!-- Content Area -->
            <div class="content">
         

                <!-- Home Slider Management -->
                <div  class="">
                    <div class="page-title">
                        <h1>Manage Home Slider</h1>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <button class="btn-primary" id="add-slider-btn-2">
                                <i class="fas fa-plus"></i> Add Slider
                            </button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="slider-table-body">
                                </tbody>
                            </table>
                        </div>
                        <div  style="display:none;" class="pagination">
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                        </div>
                    </div>
                </div>

             
            </div>
        </main>

        <!-- Modals -->
        <!-- Slider Add/Edit Modal -->
        <div id="slider-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="slider-modal-title">Add Slider Image</h2>
                    <button class="modal-close" id="close-slider-modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="slider-form">
                        <div class="form-group">
                            <label for="slider-title">Title *</label>
                            <input type="text" id="slider-title" class="form-control" placeholder="Enter slider title" required>
                        </div>
                        <div style="display:none;" class="form-group">
                            <label for="slider-subtitle">Subtitle</label>
                            <input type="text" id="slider-subtitle" class="form-control" placeholder="Enter slider subtitle">
                        </div>
                        
                        <div class="tab-nav">
                            <button type="button" class="tab-btn active" data-tab="upload">Upload Image</button>
                            <button type="button" class="tab-btn" data-tab="url">Image URL</button>
                        </div>
                        
                        <div id="upload-tab" class="tab-content active">
                            <div class="file-upload-area" id="slider-upload-area">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Drag & drop your image here or click to browse</p>
                                <span>Recommended size: 1200x600px, Max file size: 2MB</span>
                                <input type="file" id="slider-file" accept="image/*" style="display: none;">
                            </div>
                            <div id="uploaded-files" class="uploaded-files"></div>
                        </div>
                        
                        <div id="url-tab" class="tab-content">
                            <div class="form-group">
                                <label for="slider-image-url">Image URL *</label>
                                <input type="url" id="slider-image-url" class="form-control" placeholder="https://example.com/image.jpg">
                                <small>Enter a direct link to the image</small>
                            </div>
                            <div class="form-group">
                                <label>Image Preview</label>
                                <img id="slider-preview" class="image-preview" src="" alt="Preview will appear here">
                            </div>
                        </div>
                        
                        <div style="display:none;" class="form-group d-none">
                            <label for="slider-link">Link (optional)</label>
                            <input type="url" id="slider-link" class="form-control" placeholder="https://example.com">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="slider-order">Display Order *</label>
                                <input type="number" id="slider-order" class="form-control" value="1" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="slider-status">Status *</label>
                                <select id="slider-status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn-secondary" id="cancel-slider">Cancel</button>
                    <button class="btn-primary" id="save-slider">Save Slider</button>
                </div>
            </div>
        </div>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables
        let currentSliderId = null;
        const modal = document.getElementById('slider-modal');
        const closeModalBtn = document.getElementById('close-slider-modal');
        const cancelBtn = document.getElementById('cancel-slider');
        const saveBtn = document.getElementById('save-slider');
        const addBtn = document.getElementById('add-slider-btn-2');
        const form = document.getElementById('slider-form');
        const tableBody = document.getElementById('slider-table-body');
        const uploadArea = document.getElementById('slider-upload-area');
        const fileInput = document.getElementById('slider-file');
        const urlTab = document.getElementById('url-tab');
        const uploadTab = document.getElementById('upload-tab');
        const tabButtons = document.querySelectorAll('.tab-btn');
        const imageUrlInput = document.getElementById('slider-image-url');
        const previewImage = document.getElementById('slider-preview');

        // CSRF Token for AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Initialize
        loadSliders();

        // Event Listeners
        addBtn.addEventListener('click', () => openModal('add'));
        closeModalBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        saveBtn.addEventListener('click', saveSlider);

        // Tab switching
        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const tab = btn.dataset.tab;
                tabButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                document.getElementById(`${tab}-tab`).classList.add('active');
            });
        });

        // File upload handling
        uploadArea.addEventListener('click', () => fileInput.click());
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFileUpload(e.dataTransfer.files[0]);
            }
        });
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length) {
                handleFileUpload(e.target.files[0]);
            }
        });

        // Image URL preview
        imageUrlInput.addEventListener('input', () => {
            if (imageUrlInput.value) {
                previewImage.src = imageUrlInput.value;
                previewImage.style.display = 'block';
            } else {
                previewImage.style.display = 'none';
            }
        });

        // Functions
        function openModal(action, slider = null) {
            currentSliderId = slider ? slider.id : null;
            
            // Reset form
            form.reset();
            document.getElementById('slider-modal-title').textContent = 
                action === 'add' ? 'Add Slider Image' : 'Edit Slider Image';
            
            // Clear previews
            previewImage.style.display = 'none';
            document.getElementById('uploaded-files').innerHTML = '';
            
            // Set values if editing
            if (slider) {
                document.getElementById('slider-title').value = slider.title;
                document.getElementById('slider-subtitle').value = slider.subtitle || '';
                document.getElementById('slider-link').value = slider.link || '';
                document.getElementById('slider-order').value = slider.display_order;
                document.getElementById('slider-status').value = slider.status;
                
                // Set image source
                if (slider.image_path) {
                    // Show uploaded image
                    document.querySelector('[data-tab="upload"]').click();
                    const filePreview = document.createElement('div');
                    filePreview.className = 'file-preview';
                    filePreview.innerHTML = `
                        <img src="/storage/${slider.image_path}" alt="${slider.title}">
                        <span>Current image</span>
                    `;
                    document.getElementById('uploaded-files').appendChild(filePreview);
                } else if (slider.image_url) {
                    // Show URL image
                    document.querySelector('[data-tab="url"]').click();
                    document.getElementById('slider-image-url').value = slider.image_url;
                    previewImage.src = slider.image_url;
                    previewImage.style.display = 'block';
                }
            } else {
                // Default to upload tab for new sliders
                document.querySelector('[data-tab="upload"]').click();
            }
            
            modal.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
            currentSliderId = null;
        }

        function handleFileUpload(file) {
            if (!file.type.match('image.*')) {
                alert('Please select an image file');
                return;
            }
            
            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('File size must be less than 2MB');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                const uploadedFiles = document.getElementById('uploaded-files');
                uploadedFiles.innerHTML = `
                    <div class="file-preview">
                        <img src="${e.target.result}" alt="Preview">
                        <span>${file.name}</span>
                        <button type="button" onclick="this.parentElement.remove()" class="remove-file">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }

        async function loadSliders() {
            try {
                const response = await fetch('/admin/sliders');
                const sliders = await response.json();
                
                tableBody.innerHTML = '';
                sliders.forEach(slider => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${slider.id}</td>
                        <td>
                            <div class="table-image">
                                <img src="${slider.image_path ? '/storage/' + slider.image_path : slider.image_url}" 
                                     alt="${slider.title}">
                            </div>
                        </td>
                        <td>${slider.title}</td>
                        <td>${slider.display_order}</td>
                        <td>
                            <span class="status-badge ${slider.status}">
                                ${slider.status.charAt(0).toUpperCase() + slider.status.slice(1)}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit-slider" data-id="${slider.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete-slider" data-id="${slider.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
                
                // Add event listeners to edit/delete buttons
                document.querySelectorAll('.edit-slider').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const id = btn.dataset.id;
                        const response = await fetch(`/admin/sliders/${id}`);
                        const slider = await response.json();
                        openModal('edit', slider);
                    });
                });
                
                document.querySelectorAll('.delete-slider').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        if (confirm('Are you sure you want to delete this slider?')) {
                            const id = btn.dataset.id;
                            await deleteSlider(id);
                        }
                    });
                });
            } catch (error) {
                console.error('Error loading sliders:', error);
            }
        }

        async function saveSlider() {
            // Validate form
            const title = document.getElementById('slider-title').value;
            const order = document.getElementById('slider-order').value;
            const status = document.getElementById('slider-status').value;
            
            if (!title || !order) {
                alert('Please fill in all required fields');
                return;
            }
            
            const formData = new FormData();
            formData.append('title', title);
            formData.append('subtitle', document.getElementById('slider-subtitle').value);
            formData.append('link', document.getElementById('slider-link').value);
            formData.append('display_order', order);
            formData.append('status', status);
            
            // Check which tab is active
            const uploadTabActive = uploadTab.classList.contains('active');
            
            if (uploadTabActive) {
                const fileInput = document.getElementById('slider-file');
                if (fileInput.files.length) {
                    formData.append('image', fileInput.files[0]);
                } else if (currentSliderId) {
                    // Keep existing image if editing
                    formData.append('image', '');
                } else {
                    alert('Please upload an image or switch to URL tab');
                    return;
                }
            } else {
                const imageUrl = document.getElementById('slider-image-url').value;
                if (imageUrl) {
                    formData.append('image_url', imageUrl);
                } else {
                    alert('Please enter an image URL');
                    return;
                }
            }
            
            try {
                let url, method;
                
                if (currentSliderId) {
                    // Update existing
                    url = `/admin/sliders/update/${currentSliderId}`;
                    method = 'PUT';
                    formData.append('_method', 'PUT');
                } else {
                    // Create new
                    url = '/admin/sliders';
                    method = 'POST';
                }
                
                formData.append('_token', csrfToken);
                
                const response = await fetch(url, {
                    method: method,
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert(currentSliderId ? 'Slider updated successfully!' : 'Slider added successfully!');
                    closeModal();
                    loadSliders();
                } else {
                    alert('Error: ' + (result.error || 'Something went wrong'));
                }
            } catch (error) {
                console.error('Error saving slider:', error);
                alert('Error saving slider. Please try again.');
            }
        }

        async function deleteSlider(id) {
            try {
                const response = await fetch(`/admin/sliders/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Slider deleted successfully!');
                    loadSliders();
                } else {
                    alert('Error deleting slider');
                }
            } catch (error) {
                console.error('Error deleting slider:', error);
                alert('Error deleting slider. Please try again.');
            }
        }
    });
</script>

@endsection