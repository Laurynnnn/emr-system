@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<div class="container mt-5">
    <h1>Trashed Patient Details</h1>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Patient Number:</strong>
                    <p>{{ $patient->patient_number }}</p>
                </div>
                <div class="col-md-4">
                    <strong>First Name:</strong>
                    <p>{{ $patient->first_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Last Name:</strong>
                    <p>{{ $patient->last_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Gender:</strong>
                    <p>{{ ucfirst($patient->gender) }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Date of Birth:</strong>
                    <p>{{ $patient->date_of_birth }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Phone Number:</strong>
                    <p>{{ $patient->phone_number }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Next of Kin Name:</strong>
                    <p>{{ $patient->next_of_kin_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Next of Kin Relationship:</strong>
                    <p>{{ ucfirst($patient->next_of_kin_relationship) }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Next of Kin Phone Number:</strong>
                    <p>{{ $patient->next_of_kin_phone_number }}</p>
                </div>
            </div>
            <form action="{{ route('patients.reactivate', $patient->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this patient?')">Activate</button>
            </form>
        </div>
    </div>
    <a href="{{ route('patients.inactive') }}" class="btn btn-secondary mt-3">Back to Inactive Patients List</a>
</div>
@endsection
