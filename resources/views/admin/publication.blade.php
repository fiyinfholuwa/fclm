@extends('admin.app')

@section('content')
<div class="content">
    <!-- Publications Management -->
    <div class="">
        <div class="page-title">
            <h1>Manage Publications</h1>
            <p>Add, edit, or remove publications (tracts, audio, devotionals)</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">All Publications</h2>
                <div style="display: flex; gap: 10px;">
                    <select id="filter-category" class="form-control" style="width: auto;">
                        <option value="all">All Categories</option>
                        <option value="tract">Tracts</option>
                        <option value="audio">Audio</option>
                        <option value="devotional">Devotionals</option>
                    </select>
                    <button class="btn-primary" id="add-publication-btn">
                        <i class="fas fa-plus"></i> Add Publication
                    </button>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Type</th>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="publication-table-body">
                        <!-- Publication data will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Publication Add/Edit Modal -->
<div id="publication-modal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title" id="publication-modal-title">Add Publication</h2>
            <button class="modal-close" id="close-publication-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="publication-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="pub-title">Title *</label>
                        <input type="text" id="pub-title" class="form-control" placeholder="Enter publication title" required>
                    </div>
                    <div class="form-group">
                        <label for="pub-category">Category *</label>
                        <select id="pub-category" class="form-control" required>
                            <option value="">Select category</option>
                            <option value="tract">Tract</option>
                            <option value="audio">Audio</option>
                            <option value="devotional">Devotional</option>
                        </select>
                    </div>
                </div>

                <!-- Dynamic content area based on category -->
                <div id="audio-fields" class="category-fields" style="display: none;">
                    <div class="form-group">
                        <label for="pub-link">Audio Link *</label>
                        <input type="url" id="pub-link" class="form-control" placeholder="https://example.com/audio.mp3">
                        <small>Enter streaming link for audio content (MP3, etc.)</small>
                    </div>
                </div>

                <div id="file-fields" class="category-fields" style="display: none;">
                    <div class="tab-nav">
                        <button type="button" class="tab-btn active" data-tab="upload-file">Upload File</button>
                        <button type="button" class="tab-btn" data-tab="file-link">File Link</button>
                    </div>
                    
                    <div id="upload-file-tab" class="tab-content active">
                        <div class="file-upload-area" id="file-upload-area">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Drag & drop your file here or click to browse</p>
                            <span>Supported formats: PDF, DOC, DOCX. Max size: 10MB</span>
                            <input type="file" id="pub-file" accept=".pdf,.doc,.docx" style="display: none;">
                        </div>
                        <div id="uploaded-files" class="uploaded-files"></div>
                    </div>
                    
                    <div id="file-link-tab" class="tab-content">
                        <div class="form-group">
                            <label for="pub-file-link">File URL</label>
                            <input type="url" id="pub-file-link" class="form-control" placeholder="https://example.com/document.pdf">
                            <small>Enter direct link to PDF or document</small>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="pub-author">Author</label>
                        <input type="text" id="pub-author" class="form-control" placeholder="Enter author name">
                    </div>
                    <div class="form-group">
                        <label for="pub-date">Publication Date</label>
                        <input type="date" id="pub-date" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pub-description">Description</label>
                    <textarea id="pub-description" class="form-control" placeholder="Enter publication description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Thumbnail Image (Optional)</label>
                    <div class="file-upload-area" id="thumbnail-upload-area">
                        <i class="fas fa-image"></i>
                        <p>Drag & drop thumbnail image or click to browse</p>
                        <span>Recommended: 300x400px, Max: 2MB</span>
                        <input type="file" id="pub-thumbnail" accept="image/*" style="display: none;">
                    </div>
                    <div id="thumbnail-preview" class="uploaded-files"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="pub-status">Status *</label>
                        <select id="pub-status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pub-featured">
                            <input type="checkbox" id="pub-featured"> Featured Publication
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn-secondary" id="cancel-publication">Cancel</button>
            <button class="btn-primary" id="save-publication">Save Publication</button>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirm-modal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 400px;">
        <div class="modal-header">
            <h3 class="modal-title">Confirm Action</h3>
            <button class="modal-close close-confirm">&times;</button>
        </div>
        <div class="modal-body">
            <p id="confirm-message">Are you sure you want to perform this action?</p>
        </div>
        <div class="modal-footer">
            <button class="btn-secondary close-confirm">Cancel</button>
            <button class="btn-danger" id="confirm-action">Confirm</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - publications script running');
    
    // Variables
    let currentPublicationId = null;
    const modal = document.getElementById('publication-modal');
    const confirmModal = document.getElementById('confirm-modal');
    const closeModalBtn = document.getElementById('close-publication-modal');
    const cancelBtn = document.getElementById('cancel-publication');
    const saveBtn = document.getElementById('save-publication');
    const addBtn = document.getElementById('add-publication-btn');
    const filterCategory = document.getElementById('filter-category');
    const form = document.getElementById('publication-form');
    const tableBody = document.getElementById('publication-table-body');
    const categorySelect = document.getElementById('pub-category');
    
    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    if (!csrfToken) {
        console.error('CSRF token not found!');
    }

    // Initialize
    console.log('Loading publications...');
    loadPublications();

    // Event Listeners
    addBtn.addEventListener('click', function() {
        console.log('Add button clicked');
        openModal('add');
    });
    
    closeModalBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    saveBtn.addEventListener('click', savePublication);
    filterCategory.addEventListener('change', loadPublications);

    // Category change handler
    categorySelect.addEventListener('change', function() {
        console.log('Category changed to:', this.value);
        const category = this.value;
        const audioFields = document.getElementById('audio-fields');
        const fileFields = document.getElementById('file-fields');
        
        // Hide all category-specific fields
        document.querySelectorAll('.category-fields').forEach(field => {
            field.style.display = 'none';
        });
        
        // Show appropriate fields
        if (category === 'audio') {
            audioFields.style.display = 'block';
            // Set link field as required
            document.getElementById('pub-link').required = true;
        } else if (category === 'tract' || category === 'devotional') {
            fileFields.style.display = 'block';
            // Reset tabs to upload
            document.querySelector('[data-tab="upload-file"]').click();
        }
    });

    // File upload handling
    const fileUploadArea = document.getElementById('file-upload-area');
    const fileInput = document.getElementById('pub-file');
    const thumbnailUploadArea = document.getElementById('thumbnail-upload-area');
    const thumbnailInput = document.getElementById('pub-thumbnail');

    if (fileUploadArea) {
        fileUploadArea.addEventListener('click', () => fileInput.click());
    }
    
    if (thumbnailUploadArea) {
        thumbnailUploadArea.addEventListener('click', () => thumbnailInput.click());
    }

    if (fileInput) {
        fileInput.addEventListener('change', handleFileUpload);
    }
    
    if (thumbnailInput) {
        thumbnailInput.addEventListener('change', handleThumbnailUpload);
    }

    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tab = this.dataset.tab;
            this.parentElement.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            document.getElementById(`${tab}-tab`).classList.add('active');
        });
    });

    // Close confirmation modal
    document.querySelectorAll('.close-confirm').forEach(btn => {
        btn.addEventListener('click', () => {
            confirmModal.style.display = 'none';
        });
    });

    // Click outside modal to close
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
        if (event.target === confirmModal) {
            confirmModal.style.display = 'none';
        }
    });

    // Functions
    async function loadPublications() {
        try {
            const category = filterCategory.value;
            const response = await fetch(`/admin/publications/data?category=${category}`);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const publications = await response.json();
            console.log('Publications loaded:', publications.length);
            
            tableBody.innerHTML = '';
            
            if (publications.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 40px;">
                            <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 10px;"></i>
                            <p>No publications found</p>
                        </td>
                    </tr>
                `;
                return;
            }
            
            publications.forEach(pub => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${pub.id}</td>
                    <td>
                        <strong>${pub.title}</strong>
                        ${pub.featured ? '<span class="featured-badge">Featured</span>' : ''}
                    </td>
                    <td>
                        <span class="category-badge ${pub.category}">${pub.category_label}</span>
                    </td>
                    <td>${pub.author || 'N/A'}</td>
                    <td>
                        ${pub.file_path ? 'File' : pub.link ? 'Link' : 'N/A'}
                    </td>
                    <td>${new Date(pub.created_at).toLocaleDateString()}</td>
                    <td>
                        <span class="status-badge ${pub.status}">
                            ${pub.status.charAt(0).toUpperCase() + pub.status.slice(1)}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon edit-publication" data-id="${pub.id}" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-icon toggle-status" data-id="${pub.id}" data-status="${pub.status}" title="${pub.status === 'active' ? 'Deactivate' : 'Activate'}">
                                <i class="fas fa-${pub.status === 'active' ? 'eye-slash' : 'eye'}"></i>
                            </button>
                            <button class="btn-icon toggle-featured" data-id="${pub.id}" data-featured="${pub.featured}" title="${pub.featured ? 'Remove from Featured' : 'Mark as Featured'}">
                                <i class="fas fa-star" style="color: ${pub.featured ? '#fbbf24' : '#ccc'}"></i>
                            </button>
                            <button class="btn-icon delete-publication" data-id="${pub.id}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });
            
            // Add event listeners
            addPublicationEventListeners();
        } catch (error) {
            console.error('Error loading publications:', error);
            showNotification('Error loading publications', 'error');
        }
    }

    function addPublicationEventListeners() {
        // Edit buttons
        document.querySelectorAll('.edit-publication').forEach(btn => {
            btn.addEventListener('click', async () => {
                const id = btn.dataset.id;
                try {
                    const response = await fetch(`/admin/publications/detail/${id}`);
                    if (!response.ok) {
                        throw new Error('Failed to fetch publication');
                    }
                    const publication = await response.json();
                    openModal('edit', publication);
                } catch (error) {
                    console.error('Error fetching publication:', error);
                    showNotification('Error loading publication details', 'error');
                }
            });
        });
        
        // Delete buttons
        document.querySelectorAll('.delete-publication').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                showConfirmation(
                    'Delete Publication',
                    'Are you sure you want to delete this publication? This action cannot be undone.',
                    () => deletePublication(id)
                );
            });
        });
        
        // Toggle status buttons
        document.querySelectorAll('.toggle-status').forEach(btn => {
            btn.addEventListener('click', async () => {
                const id = btn.dataset.id;
                await togglePublicationStatus(id);
            });
        });
        
        // Toggle featured buttons
        document.querySelectorAll('.toggle-featured').forEach(btn => {
            btn.addEventListener('click', async () => {
                const id = btn.dataset.id;
                await toggleFeatured(id);
            });
        });
    }

    function openModal(action, publication = null) {
        console.log('Opening modal for action:', action, 'with publication:', publication);
        currentPublicationId = publication ? publication.id : null;
        
        // Reset form
        form.reset();
        document.getElementById('publication-modal-title').textContent = 
            action === 'add' ? 'Add Publication' : 'Edit Publication';
        
        // Clear previews
        document.getElementById('uploaded-files').innerHTML = '';
        document.getElementById('thumbnail-preview').innerHTML = '';
        
        // Reset all category fields
        document.querySelectorAll('.category-fields').forEach(field => {
            field.style.display = 'none';
        });
        
        // Clear link inputs
        document.getElementById('pub-link').value = '';
        document.getElementById('pub-file-link').value = '';
        
        // Set default status
        document.getElementById('pub-status').value = 'active';
        document.getElementById('pub-featured').checked = false;
        
        // Set current date as default
        document.getElementById('pub-date').value = new Date().toISOString().split('T')[0];
        
        // Set values if editing
        if (publication) {
            document.getElementById('pub-title').value = publication.title;
            document.getElementById('pub-category').value = publication.category;
            document.getElementById('pub-author').value = publication.author || '';
            document.getElementById('pub-description').value = publication.description || '';
            document.getElementById('pub-status').value = publication.status;
            document.getElementById('pub-featured').checked = publication.featured;
            
            // Set date
            if (publication.publication_date) {
                document.getElementById('pub-date').value = publication.publication_date.split('T')[0];
            }
            
            // Trigger category change to show appropriate fields
            setTimeout(() => {
                categorySelect.dispatchEvent(new Event('change'));
                
                // Set file/link based on category
                if (publication.category === 'audio') {
                    document.getElementById('pub-link').value = publication.link || '';
                } else {
                    if (publication.file_path) {
                        // Show uploaded file
                        document.querySelector('[data-tab="upload-file"]').click();
                        const filePreview = document.createElement('div');
                        filePreview.className = 'file-preview';
                        filePreview.innerHTML = `
                            <div class="file-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <span>Current file: ${publication.file_path.split('/').pop()}</span>
                            <button type="button" onclick="this.parentElement.remove();" class="remove-file">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        document.getElementById('uploaded-files').appendChild(filePreview);
                    } else if (publication.link) {
                        document.querySelector('[data-tab="file-link"]').click();
                        document.getElementById('pub-file-link').value = publication.link;
                    }
                }
                
                // Show thumbnail if exists
                if (publication.thumbnail_url && !publication.thumbnail_url.includes('default')) {
                    const thumbnailPreview = document.createElement('div');
                    thumbnailPreview.className = 'file-preview';
                    thumbnailPreview.innerHTML = `
                        <img src="${publication.thumbnail_url}" alt="Thumbnail">
                        <button type="button" onclick="this.parentElement.remove();" class="remove-file">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    document.getElementById('thumbnail-preview').appendChild(thumbnailPreview);
                }
            }, 100);
        } else {
            // Default to tract category for new publications
            categorySelect.value = 'tract';
            setTimeout(() => {
                categorySelect.dispatchEvent(new Event('change'));
            }, 100);
        }
        
        modal.style.display = 'block';
        console.log('Modal should be visible now');
    }

    function closeModal() {
        modal.style.display = 'none';
        currentPublicationId = null;
    }

    function handleFileUpload(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        console.log('File selected:', file.name, file.type, file.size);
        
        // Validate file type
        const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (!validTypes.includes(file.type)) {
            showNotification('Please select a PDF, DOC, or DOCX file', 'error');
            return;
        }
        
        // Validate file size (10MB)
        if (file.size > 10 * 1024 * 1024) {
            showNotification('File size must be less than 10MB', 'error');
            return;
        }
        
        const uploadedFiles = document.getElementById('uploaded-files');
        uploadedFiles.innerHTML = `
            <div class="file-preview">
                <div class="file-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <span>${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
                <button type="button" onclick="this.parentElement.remove(); document.getElementById('pub-file').value = '';" class="remove-file">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }

    function handleThumbnailUpload(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        if (!file.type.match('image.*')) {
            showNotification('Please select an image file', 'error');
            return;
        }
        
        if (file.size > 2 * 1024 * 1024) {
            showNotification('Image size must be less than 2MB', 'error');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const thumbnailPreview = document.getElementById('thumbnail-preview');
            thumbnailPreview.innerHTML = `
                <div class="file-preview">
                    <img src="${e.target.result}" alt="Thumbnail">
                    <button type="button" onclick="this.parentElement.remove(); document.getElementById('pub-thumbnail').value = '';" class="remove-file">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }

    async function savePublication() {
        console.log('Saving publication...');
        
        // Validate form
        const title = document.getElementById('pub-title').value;
        const category = document.getElementById('pub-category').value;
        
        if (!title || !category) {
            showNotification('Please fill in all required fields', 'error');
            return;
        }
        
        // Validate based on category
        if (category === 'audio') {
            const link = document.getElementById('pub-link').value;
            if (!link) {
                showNotification('Audio link is required', 'error');
                return;
            }
        } else {
            const activeTab = document.querySelector('.tab-btn.active');
            if (!activeTab) {
                showNotification('Please select file upload or link option', 'error');
                return;
            }
            
            if (activeTab.dataset.tab === 'upload-file') {
                const fileInput = document.getElementById('pub-file');
                if (!fileInput.files.length && !currentPublicationId) {
                    showNotification('Please upload a file or use the link tab', 'error');
                    return;
                }
            } else {
                const fileLink = document.getElementById('pub-file-link').value;
                if (!fileLink && !currentPublicationId) {
                    showNotification('Please enter a file link or upload a file', 'error');
                    return;
                }
            }
        }
        
        const formData = new FormData();
        formData.append('title', title);
        formData.append('category', category);
        formData.append('author', document.getElementById('pub-author').value);
        formData.append('description', document.getElementById('pub-description').value);
        formData.append('publication_date', document.getElementById('pub-date').value);
        formData.append('status', document.getElementById('pub-status').value);
        formData.append('featured', document.getElementById('pub-featured').checked ? '1' : '0');
        
        // Add appropriate file/link based on category
        if (category === 'audio') {
            formData.append('link', document.getElementById('pub-link').value);
        } else {
            const activeTab = document.querySelector('.tab-btn.active').dataset.tab;
            if (activeTab === 'upload-file') {
                const fileInput = document.getElementById('pub-file');
                if (fileInput.files.length) {
                    formData.append('file', fileInput.files[0]);
                }
            } else {
                formData.append('link', document.getElementById('pub-file-link').value);
            }
        }
        
        // Add thumbnail if selected
        const thumbnailInput = document.getElementById('pub-thumbnail');
        if (thumbnailInput.files.length) {
            formData.append('thumbnail', thumbnailInput.files[0]);
        }
        
        formData.append('_token', csrfToken);
        
        try {
            let url, method;
            
            if (currentPublicationId) {
                url = `/admin/publications/${currentPublicationId}`;
                method = 'POST';
                formData.append('_method', 'PUT');
            } else {
                url = '/admin/publications';
                method = 'POST';
            }
            
            console.log('Sending request to:', url);
            
            const response = await fetch(url, {
                method: method,
                body: formData
            });
            
            const result = await response.json();
            console.log('Save response:', result);
            
            if (result.success) {
                showNotification(result.message || 'Publication saved successfully!', 'success');
                closeModal();
                loadPublications();
            } else {
                if (result.errors) {
                    const errorMessages = Object.values(result.errors).flat().join(', ');
                    showNotification(errorMessages, 'error');
                } else {
                    showNotification(result.error || 'Error saving publication', 'error');
                }
            }
        } catch (error) {
            console.error('Error saving publication:', error);
            showNotification('Error saving publication. Please try again.', 'error');
        }
    }

    async function deletePublication(id) {
        try {
            const response = await fetch(`/admin/publications/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                showNotification('Publication deleted successfully', 'success');
                loadPublications();
            } else {
                showNotification('Error deleting publication', 'error');
            }
        } catch (error) {
            console.error('Error deleting publication:', error);
            showNotification('Error deleting publication', 'error');
        } finally {
            confirmModal.style.display = 'none';
        }
    }

    async function togglePublicationStatus(id) {
        try {
            const response = await fetch(`/admin/publications/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                showNotification('Status updated successfully', 'success');
                loadPublications();
            }
        } catch (error) {
            console.error('Error toggling status:', error);
            showNotification('Error updating status', 'error');
        }
    }

    async function toggleFeatured(id) {
        try {
            const response = await fetch(`/admin/publications/${id}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                showNotification('Featured status updated', 'success');
                loadPublications();
            }
        } catch (error) {
            console.error('Error toggling featured:', error);
            showNotification('Error updating featured status', 'error');
        }
    }

    function showConfirmation(title, message, confirmCallback) {
        document.getElementById('confirm-message').textContent = message;
        document.querySelector('#confirm-modal .modal-title').textContent = title;
        
        const confirmBtn = document.getElementById('confirm-action');
        // Remove previous event listeners
        confirmBtn.replaceWith(confirmBtn.cloneNode(true));
        const newConfirmBtn = document.getElementById('confirm-action');
        newConfirmBtn.onclick = confirmCallback;
        
        confirmModal.style.display = 'block';
    }

    function showNotification(message, type = 'info') {
        // Remove existing notifications
        document.querySelectorAll('.notification').forEach(n => n.remove());
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 6px;
            color: white;
            z-index: 10000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-width: 300px;
            animation: slideIn 0.3s ease;
            background-color: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        `;
        
        notification.innerHTML = `
            <span>${message}</span>
            <button style="background: none; border: none; color: white; cursor: pointer; margin-left: 10px;">&times;</button>
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Add close button event
        notification.querySelector('button').addEventListener('click', () => {
            notification.remove();
        });
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
});
</script>

<style>
/* Modal styles */
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
    max-height: 80vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e5e7eb;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #6b7280;
}

.modal-close:hover {
    color: #374151;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

/* Button styles */
.btn-primary {
    background-color: #4f46e5;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #4338ca;
}

.btn-secondary {
    background-color: #6b7280;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #4b5563;
}

.btn-danger {
    background-color: #ef4444;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #dc2626;
}

/* Category badges */
.category-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    text-transform: capitalize;
    display: inline-block;
}

.category-badge.tract {
    background-color: #e0f2fe;
    color: #0369a1;
}

.category-badge.audio {
    background-color: #fef3c7;
    color: #92400e;
}

.category-badge.devotional {
    background-color: #dcfce7;
    color: #166534;
}

/* Status badges */
.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    display: inline-block;
}

.status-badge.active {
    background-color: #dcfce7;
    color: #166534;
}

.status-badge.inactive {
    background-color: #fee2e2;
    color: #991b1b;
}

/* Featured badge */
.featured-badge {
    background-color: #fef3c7;
    color: #92400e;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 11px;
    margin-left: 8px;
    display: inline-block;
}

/* File upload area */
.file-upload-area {
    border: 2px dashed #ddd;
    border-radius: 8px;
    padding: 40px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s;
    margin-bottom: 15px;
}

.file-upload-area:hover,
.file-upload-area.dragover {
    border-color: #4f46e5;
    background-color: #f9fafb;
}

.file-upload-area i {
    font-size: 48px;
    color: #888;
    margin-bottom: 10px;
}

.file-upload-area p {
    margin: 10px 0;
    color: #374151;
}

.file-upload-area span {
    color: #6b7280;
    font-size: 12px;
}

/* File preview */
.file-preview {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 12px;
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
}

.file-preview img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
}

.file-icon {
    font-size: 32px;
    color: #ef4444;
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
    display: flex;
    align-items: center;
    justify-content: center;
}

.remove-file:hover {
    background: #dc2626;
}

/* Tab navigation */
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
    color: #6b7280;
    font-weight: 500;
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

/* Form styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #374151;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 14px;
}

.form-control:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.form-row {
    display: flex;
    gap: 20px;
}

.form-row .form-group {
    flex: 1;
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
}

/* Action buttons */
.action-buttons {
    display: flex;
    gap: 5px;
}

.btn-icon {
    padding: 6px;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    background: white;
    cursor: pointer;
    transition: all 0.2s;
    color: #6b7280;
}

.btn-icon:hover {
    background: #f9fafb;
    transform: translateY(-1px);
}

/* Category fields */
.category-fields {
    margin: 20px 0;
    padding: 20px;
    background: #f9fafb;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
}

/* Animation for notification */
@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>
@endsection