@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Clinic</h1>
    <form action="{{ route('clinics.update', $clinic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Clinic Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $clinic->name) }}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Clinic</button>
    </form>
</div>
@endsection
