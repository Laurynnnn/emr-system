<!-- resources/views/patients/edit.blade.php -->
@extends('patient::layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div class="container mt-5">
    <h1>Edit Patient</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $patient->first_name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $patient->last_name }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $patient->date_of_birth }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $patient->phone_number }}">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="next_of_kin_name">Next of Kin Name:</label>
                    <input type="text" class="form-control" name="next_of_kin_name" id="next_of_kin_name" value="{{ $patient->next_of_kin_name }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="next_of_kin_relationship">Next of Kin Relationship:</label>
                    <select class="form-control" name="next_of_kin_relationship" id="next_of_kin_relationship" required>
                        <option value="mother" {{ $patient->next_of_kin_relationship == 'mother' ? 'selected' : '' }}>Mother</option>
                        <option value="father" {{ $patient->next_of_kin_relationship == 'father' ? 'selected' : '' }}>Father</option>
                        <option value="daughter" {{ $patient->next_of_kin_relationship == 'daughter' ? 'selected' : '' }}>Daughter</option>
                        <option value="son" {{ $patient->next_of_kin_relationship == 'son' ? 'selected' : '' }}>Son</option>
                        <option value="uncle" {{ $patient->next_of_kin_relationship == 'uncle' ? 'selected' : '' }}>Uncle</option>
                        <option value="other" {{ $patient->next_of_kin_relationship == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="next_of_kin_phone_number">Next of Kin Phone Number:</label>
                    <input type="text" class="form-control" name="next_of_kin_phone_number" id="next_of_kin_phone_number" value="{{ $patient->next_of_kin_phone_number }}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Patient</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients List</a>
    </form>
</div>
@endsection
