@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Drug Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $drug->name }}</h5>
                <p class="card-text"><strong>Brand Name:</strong> {{ $drug->brand_name }}</p>
                <p class="card-text"><strong>Form:</strong> {{ $drug->form }}</p>
                <p class="card-text"><strong>Code:</strong> {{ $drug->code }}</p>
                <a href="{{ route('drugs.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
