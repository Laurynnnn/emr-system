@extends('layouts.app')

@section('title', 'Diagnosis Details')

@section('content')
<div class="container mt-5">
    <h1>Trashed Diagnosis Details</h1>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                    <p>{{ $diagnosis->name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>ICD-11 Code:</strong>
                    <p>{{ $diagnosis->icd11_code }}</p>
                </div>
            </div>
            <form action="{{ route('diagnoses.reactivate', $diagnosis->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this diagnosis?')">Reactivate</button>
            </form>
        </div>
    </div>
    <a href="{{ route('diagnoses.inactive') }}" class="btn btn-secondary mt-3">Back to Inactive Diagnoses List</a>
</div>
@endsection
