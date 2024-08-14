@extends('layouts.app')

@section('title', 'Lab Test Details')

@section('content')
<div class="container mt-5">
    <h1>Inactive Lab Test Details</h1>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                    <p>{{ $labTest->name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Duration (minutes):</strong>
                    <p>{{ $labTest->duration }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Authenticated:</strong>
                    <p>{{ $labTest->authenticated ? 'Yes' : 'No' }}</p>
                </div>
            </div>
            <form action="{{ route('lab_tests.reactivate', $labTest->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this lab test?')">Reactivate</button>
            </form>
        </div>
    </div>
    <a href="{{ route('lab_tests.inactive') }}" class="btn btn-secondary mt-3">Back to Inactive Lab Tests List</a>
</div>
@endsection
