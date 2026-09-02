@extends('admin.app')

@section('content')
<div class="content media-admin">
    <div class="admin-page-heading">
        <div><p class="admin-eyebrow">Website content</p><h1>Gallery</h1><p>Manage the photographs displayed on the public gallery page.</p></div>
        <button class="admin-add-button" type="button" onclick="document.getElementById('add-gallery-image').showModal()"><i class="fas fa-plus"></i> Add photo</button>
    </div>

    @if(session('success')) <div class="admin-alert success"><i class="fas fa-check-circle"></i>{{ session('success') }}</div> @endif
    @if($errors->any()) <div class="admin-alert error"><i class="fas fa-circle-exclamation"></i>{{ $errors->first() }}</div> @endif

    <div class="gallery-admin-summary"><span><strong>{{ $images->where('status', 'active')->count() }}</strong> live photos</span><span><strong>{{ $images->where('status', 'inactive')->count() }}</strong> hidden</span><span>Drag-free ordering: change the number and save.</span></div>

    <div class="gallery-admin-grid">
        @forelse($images as $image)
            @php($url = asset($image->image_path))
            <article class="gallery-admin-card {{ $image->status === 'inactive' ? 'is-hidden' : '' }}">
                <img src="{{ $url }}" alt="{{ $image->title }}">
                <div class="gallery-admin-card-body">
                    <div><p class="gallery-admin-order">Photo {{ $image->display_order }}</p><h2>{{ $image->title ?: 'Untitled photo' }}</h2></div>
                    <span class="admin-status {{ $image->status }}">{{ $image->status === 'active' ? 'Live' : 'Hidden' }}</span>
                </div>
                <div class="gallery-admin-actions">
                    <button type="button" class="admin-quiet-button" onclick="document.getElementById('edit-image-{{ $image->id }}').showModal()"><i class="fas fa-pen"></i> Edit</button>
                    <form method="POST" action="{{ route('gallery.delete', $image) }}" onsubmit="return confirm('Remove this photo from the gallery?')">@csrf @method('DELETE')<button class="admin-delete-button" title="Remove photo"><i class="fas fa-trash"></i></button></form>
                </div>
            </article>

            <dialog id="edit-image-{{ $image->id }}" class="admin-dialog">
                <div class="admin-dialog-title"><div><p class="admin-eyebrow">Gallery photo</p><h2>Edit photo</h2></div><button type="button" onclick="this.closest('dialog').close()"><i class="fas fa-xmark"></i></button></div>
                <form method="POST" action="{{ route('gallery.update', $image) }}" enctype="multipart/form-data" class="admin-form">@csrf @method('PUT')
                    <img class="admin-form-image" src="{{ $url }}" alt="">
                    <label>Photo title <input name="title" value="{{ old('title', $image->title) }}" placeholder="Optional title"></label>
                    <div class="admin-form-row"><label>Display order <input type="number" name="display_order" min="1" value="{{ old('display_order', $image->display_order) }}" required></label><label>Visibility <select name="status"><option value="active" @selected($image->status === 'active')>Live on website</option><option value="inactive" @selected($image->status === 'inactive')>Hidden</option></select></label></div>
                    <label>Replace photo <input type="file" name="image" accept="image/*"><small>Leave empty to keep the current photo.</small></label>
                    <div class="admin-form-footer"><button type="button" class="admin-quiet-button" onclick="this.closest('dialog').close()">Cancel</button><button class="admin-add-button">Save changes</button></div>
                </form>
            </dialog>
        @empty
            <div class="admin-empty-state"><i class="fas fa-images"></i><h2>Your gallery is empty</h2><p>Add a photo to start building the public gallery.</p><button class="admin-add-button" type="button" onclick="document.getElementById('add-gallery-image').showModal()">Add first photo</button></div>
        @endforelse
    </div>
</div>

<dialog id="add-gallery-image" class="admin-dialog">
    <div class="admin-dialog-title"><div><p class="admin-eyebrow">New gallery photo</p><h2>Add photo</h2></div><button type="button" onclick="this.closest('dialog').close()"><i class="fas fa-xmark"></i></button></div>
    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" class="admin-form">@csrf
        <label>Photo <input type="file" name="image" accept="image/*" required></label>
        <label>Photo title <input name="title" value="{{ old('title') }}" placeholder="Optional title"></label>
        <div class="admin-form-row"><label>Display order <input type="number" name="display_order" value="{{ old('display_order', ($images->max('display_order') ?? 0) + 1) }}" min="1" required></label><label>Visibility <select name="status"><option value="active">Live on website</option><option value="inactive">Hidden</option></select></label></div>
        <div class="admin-form-footer"><button type="button" class="admin-quiet-button" onclick="this.closest('dialog').close()">Cancel</button><button class="admin-add-button">Upload photo</button></div>
    </form>
</dialog>

@include('admin.partials.content-admin-styles')
@endsection
