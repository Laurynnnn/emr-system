@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Lab Test</h1>
        <form action="{{ route('lab_tests.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" id="duration" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}">
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="results">Results</label>
                <textarea id="results" name="results" class="form-control @error('results') is-invalid @enderror">{{ old('results') }}</textarea>
                @error('results')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" id="authenticated" name="authenticated" class="form-check-input" {{ old('authenticated') ? 'checked' : '' }}>
                <label for="authenticated" class="form-check-label">Authenticated by senior lab technician</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
