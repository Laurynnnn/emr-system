@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Clinic</h1>
    <form action="{{ route('clinics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Clinic Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Clinic</button>
    </form>
</div>
@endsection
