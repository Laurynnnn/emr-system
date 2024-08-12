@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Diagnosis Details</h1>
        <p><strong>Name:</strong> {{ $diagnosis->name }}</p>
        <p><strong>ICD11 Code:</strong> {{ $diagnosis->icd11_code }}</p>
        <a href="{{ route('diagnoses.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
