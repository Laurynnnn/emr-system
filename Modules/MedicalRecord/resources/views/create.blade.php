@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Medical Record for Patient: {{ $patient->first_name }} {{ $patient->last_name }}</h1>

    <form action="{{ route('medical_records.store') }}" method="POST">
        @csrf

        <!-- Patient ID -->
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

        <!-- Doctor ID -->
        {{-- <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}"> --}}
        <input type="hidden" name="doctor_id" value="{{ auth()->check() ? auth()->user()->id : 1 }}">



        <!-- Symptoms -->
        <div class="form-group">
            <label for="symptoms">Symptoms</label>
            <textarea name="symptoms" id="symptoms" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Lab Tests -->
        <div class="form-group">
            <label for="lab_tests">Lab Tests</label>
            <select name="lab_tests[]" id="lab_tests" class="form-control" multiple>
                @foreach($labTests as $labTest)
                    <option value="{{ $labTest->id }}">{{ $labTest->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Medical Diagnoses -->
        <div class="form-group">
            <label for="medical_diagnoses">Medical Diagnoses</label>
            <select name="medical_diagnoses[]" id="medical_diagnoses" class="form-control" multiple>
                @foreach($diagnoses as $diagnosis)
                    <option value="{{ $diagnosis->id }}">{{ $diagnosis->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Treatment Given -->
        <div class="form-group">
            <label for="treatment_given">Treatment Given</label>
            <textarea name="treatment_given" id="treatment_given" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Outcome -->
        <div class="form-group">
            <label for="outcome">Outcome</label>
            <select name="outcome" id="outcome" class="form-control" required>
                <option value="admitted">Admitted</option>
                <option value="died">Died</option>
                <option value="referred">Referred</option>
                <option value="discharged">Discharged</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Medical Record</button>
    </form>
</div>
@endsection
