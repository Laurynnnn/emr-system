@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lab Test Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $labTest->name }}</p>
                <p><strong>Duration:</strong> {{ $labTest->duration }} minutes</p>
                <p><strong>Results:</strong> {{ $labTest->results ?? 'N/A' }}</p>
                <p><strong>Authenticated:</strong> {{ $labTest->authenticated ? 'Yes' : 'No' }}</p>
                <a href="{{ route('lab_tests.edit', $labTest) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('lab_tests.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
