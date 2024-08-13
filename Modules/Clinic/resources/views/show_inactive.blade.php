@extends('layouts.app')

@section('title', 'Clinic Details')

@section('content')
<div class="container mt-5">
    <h1>Trashed Clinic Details</h1>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                    <p>{{ $clinic->name }}</p>
                </div>
            </div>
            <form action="{{ route('clinics.reactivate', $clinic->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this clinic?')">Reactivate</button>
            </form>
        </div>
    </div>
    <a href="{{ route('clinics.inactive') }}" class="btn btn-secondary mt-3">Back to Inactive Clinics List</a>
</div>
@endsection
