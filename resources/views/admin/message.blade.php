@extends('admin.app')

@section('content')
<!-- Content Area -->
<div class="content">
    <!-- Contact Messages -->
    <div>
        <div class="page-title">
            <h1>Contact Messages</h1>
            <p>View messages sent through the website contact form</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">All Messages</h2>
                <div>
                    <span id="new-message-count" class="badge" style="background-color: var(--brand-blue); color: white;">{{ $messages->count() }} New</span>
                </div>
            </div>
            <div id="messages-container">
                <!-- Messages table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->full_name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone ?? '—' }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ \Carbon\Carbon::parse($message->created_at)->format('M d, Y') }}</td>
                            <td>
                                {{-- <button class="btn-view" onclick="viewMessage({{ $message->id }})">
                                    <i class="fas fa-eye"></i> View
                                </button> --}}
                                <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}" class="btn-email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                @if($message->phone)
                                <a href="tel:{{ $message->phone }}" class="btn-phone">
                                    <i class="fas fa-phone"></i>
                                </a>
                                @endif
                                <button class="btn-delete" onclick="deleteMessage({{ $message->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No messages found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- View Message Modal -->
<div id="message-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Message Details</h2>
            <button class="modal-close" id="close-message-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>From:</label>
                <p id="message-from" class="form-control" style="background-color: #f9f9f9;"></p>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <p id="message-phone" class="form-control" style="background-color: #f9f9f9;"></p>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <p id="message-date" class="form-control" style="background-color: #f9f9f9;"></p>
            </div>
            <div class="form-group">
                <label>Subject:</label>
                <p id="message-subject" class="form-control" style="background-color: #f9f9f9;"></p>
            </div>
            <div class="form-group">
                <label>Message:</label>
                <p id="message-text" class="form-control" style="background-color: #f9f9f9; min-height: 150px;"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-secondary" id="close-message-btn">Close</button>
            <a href="#" id="modal-email-link" class="btn-primary">Reply via Email</a>
            <a href="#" id="modal-phone-link" class="btn-secondary" style="display: none;">Call</a>
        </div>
    </div>
</div>

<style>
.table {
    width: 100%;
    border-collapse: collapse;
}
.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #eee;
}
.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}
.btn-view,
.btn-email,
.btn-phone,
.btn-delete {
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
    display: inline-block;
    text-decoration: none;
    color: white;
}
.btn-view {
    background-color: #4a6cf7;
}
.btn-view:hover {
    background-color: #3a5bd9;
}
.btn-email {
    background-color: #28a745;
}
.btn-email:hover {
    background-color: #218838;
}
.btn-phone {
    background-color: #17a2b8;
}
.btn-phone:hover {
    background-color: #138496;
}
.btn-delete {
    background-color: #dc3545;
}
.btn-delete:hover {
    background-color: #c82333;
}
.pagination {
    display: flex;
    justify-content: center;
    padding: 15px 0;
}
.pagination .page-item.active .page-link {
    background-color: #4a6cf7;
    border-color: #4a6cf7;
}
</style>

<script>
// Pass messages data to JavaScript
const messagesData = @json($messages);

// View message function
{{-- function viewMessage(id) {
    const message = messagesData.find(m => m.id === id);
    if (!message) {
        alert('Message not found');
        return;
    }

    // Populate modal fields
    document.getElementById('message-from').innerText = `${message.full_name} <${message.email}>`;
    document.getElementById('message-phone').innerText = message.phone || 'Not provided';
    document.getElementById('message-date').innerText = new Date(message.created_at).toLocaleString();
    document.getElementById('message-subject').innerText = message.subject;
    document.getElementById('message-text').innerText = message.message;

    // Set up modal action links
    const emailLink = document.getElementById('modal-email-link');
    emailLink.href = `mailto:${message.email}?subject=Re: ${encodeURIComponent(message.subject)}`;
    
    const phoneLink = document.getElementById('modal-phone-link');
    if (message.phone) {
        phoneLink.href = `tel:${message.phone}`;
        phoneLink.style.display = 'inline-block';
    } else {
        phoneLink.style.display = 'none';
    }

    // Show modal
    document.getElementById('message-modal').classList.add('show');
    document.body.style.overflow = 'hidden';
} --}}

// Close modal
function closeModal() {
    document.getElementById('message-modal').classList.remove('show');
    document.body.style.overflow = 'auto';
}

function deleteMessage(id) {
    if (confirm('Are you sure you want to delete this message?')) {
        fetch(`/admin/messages/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting message');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting message');
        });
    }
}

// Close modal events
document.getElementById('close-message-modal').addEventListener('click', closeModal);
document.getElementById('close-message-btn').addEventListener('click', closeModal);

// Close modal when clicking outside
window.addEventListener('click', function(event) {
    const modal = document.getElementById('message-modal');
    if (event.target === modal) {
        closeModal();
    }
});
</script>
@endsection