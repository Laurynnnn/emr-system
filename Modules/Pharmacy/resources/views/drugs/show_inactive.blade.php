@extends('layouts.app')

@section('title', 'Trashed Drug Details')

@section('content')
<div class="container mt-5">
    <h1>Trashed Drug Details</h1>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                    <p>{{ $drug->name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Brand Name:</strong>
                    <p>{{ $drug->brand_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Form:</strong>
                    <p>{{ $drug->form }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Code:</strong>
                    <p>{{ $drug->code }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Created At:</strong>
                    <p>{{ $drug->created_at->format('d-m-Y H:i') }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Updated At:</strong>
                    <p>{{ $drug->updated_at->format('d-m-Y H:i') }}</p>
                </div>
            </div>
            <form action="{{ route('drugs.reactivate', $drug->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this drug?')">Reactivate</button>
            </form>
        </div>
    </div>
    <a href="{{ route('drugs.inactive') }}" class="btn btn-secondary mt-3">Back to Inactive Drugs List</a>
</div>
@endsection
