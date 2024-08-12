@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $clinic->name }}</h1>
    <div class="mb-3">
        <strong>Clinic Name:</strong> {{ $clinic->name }}
    </div>
    <div>
        <a href="{{ route('clinics.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('clinics.edit', $clinic->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection
