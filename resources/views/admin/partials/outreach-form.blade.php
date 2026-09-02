<input class="form-control" name="title" placeholder="Programme title" value="{{ old('title', $programme->title ?? '') }}" required><br>
<textarea class="form-control" name="description" placeholder="Short description" required>{{ old('description', $programme->description ?? '') }}</textarea><br>
<input class="form-control" name="icon" placeholder="Font Awesome icon, e.g. fa-city" value="{{ old('icon', $programme->icon ?? 'fa-hands-helping') }}" required><br>
<select class="form-control" name="colour">@foreach(['yellow','green','blue','red','purple'] as $colour)<option value="{{ $colour }}" @selected(old('colour', $programme->colour ?? 'green')===$colour)>{{ ucfirst($colour) }}</option>@endforeach</select><br>
<input class="form-control" type="number" name="display_order" min="1" value="{{ old('display_order', $programme->display_order ?? 1) }}" required><br>
<select class="form-control" name="status"><option value="active" @selected(old('status', $programme->status ?? 'active')==='active')>Active</option><option value="inactive" @selected(old('status', $programme->status ?? '')==='inactive')>Hidden</option></select><br>
<button class="btn-primary">{{ $button }}</button>
