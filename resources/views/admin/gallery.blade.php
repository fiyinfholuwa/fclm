@extends('admin.app')
@section('content')
<div class="content">
    <div class="page-title"><h1>Manage Gallery</h1><p>Add, replace, hide, or remove gallery pictures.</p></div>
    @if(session('success')) <p class="mb-4" style="color:green">{{ session('success') }}</p> @endif
    <div class="card" style="padding:20px; margin-bottom:25px"><h2 class="card-title">Add a picture</h2>
        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
            @csrf <input class="form-control" name="title" placeholder="Picture title (optional)"><br>
            <input type="file" name="image" accept="image/*" required><br><br>
            <input class="form-control" type="number" name="display_order" value="{{ $images->max('display_order') + 1 }}" min="1" required><br>
            <select class="form-control" name="status"><option value="active">Active</option><option value="inactive">Hidden</option></select><br>
            <button class="btn-primary">Add Picture</button>
        </form>
    </div>
    <div class="card"><div class="table-container"><table><thead><tr><th>Picture</th><th>Title / order</th><th>Visibility</th><th>Update</th><th>Remove</th></tr></thead><tbody>
    @foreach($images as $image) @php($url = asset($image->image_path))
    <tr><td><img src="{{ $url }}" alt="" style="width:100px;height:70px;object-fit:cover"></td><td>{{ $image->title }}<br>#{{ $image->display_order }}</td><td>{{ ucfirst($image->status) }}</td><td>
        <form method="POST" action="{{ route('gallery.update',$image) }}" enctype="multipart/form-data">@csrf @method('PUT')
        <input name="title" value="{{ $image->title }}" placeholder="Title"><input type="number" name="display_order" value="{{ $image->display_order }}" min="1"><select name="status"><option value="active" @selected($image->status==='active')>Active</option><option value="inactive" @selected($image->status==='inactive')>Hidden</option></select><input type="file" name="image" accept="image/*"><button class="btn-primary">Save</button></form>
    </td><td><form method="POST" action="{{ route('gallery.delete',$image) }}" onsubmit="return confirm('Remove this image?')">@csrf @method('DELETE')<button class="btn-secondary">Remove</button></form></td></tr>
    @endforeach</tbody></table></div></div>
</div>
@endsection
