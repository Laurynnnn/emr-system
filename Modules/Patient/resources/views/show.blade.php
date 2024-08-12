@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<div class="container mt-5">
    <h1>Patient Details</h1>
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
                    <p>{{ ($patient->gender) }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Date of Birth:</strong>
                    <p>{{ ($patient->date_of_birth) }}</p>
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
            <div class="d-flex justify-content-between">
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Back to Patients List</a>
    <a href="{{ route('medical_records.create', $patient->id) }}" class="btn btn-primary mt-3">Create New Medical Record</a>
    {{-- <a href="{{ route('medical_records.index', $patient->id) }}" class="btn btn-info mt-3">View Medical Record</a> --}}
    <a href="{{ route('patients.medical-records.index', $patient->id) }}" class="btn btn-info mt-3">View Medical Records</a>
</div>
@endsection
