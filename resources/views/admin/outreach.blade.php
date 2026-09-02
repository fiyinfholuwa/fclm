@extends('admin.app')
@section('content')
<div class="content"><div class="page-title"><h1>Manage Community Outreach</h1><p>These items appear under Community Outreach on the Programmes page.</p></div>
@if(session('success')) <p class="mb-4" style="color:green">{{ session('success') }}</p> @endif
<div class="card" style="padding:20px;margin-bottom:25px"><h2 class="card-title">Add programme</h2><form method="POST" action="{{ route('outreach.store') }}">@csrf @include('admin.partials.outreach-form', ['programme'=>null, 'button'=>'Add Programme'])</form></div>
<div class="card" style="padding:20px">@foreach($programmes as $programme)<div style="padding:20px 0;border-bottom:1px solid #ddd"><form method="POST" action="{{ route('outreach.update',$programme) }}">@csrf @method('PUT') @include('admin.partials.outreach-form', ['button'=>'Save Changes'])</form><form method="POST" action="{{ route('outreach.delete',$programme) }}" onsubmit="return confirm('Remove this programme?')">@csrf @method('DELETE')<button class="btn-secondary">Remove</button></form></div>@endforeach</div></div>
@endsection
