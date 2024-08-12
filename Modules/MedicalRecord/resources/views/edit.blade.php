@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Medical Record #{{ $medicalRecord->id }} for Patient: {{ $medicalRecord->patient->first_name }} {{ $medicalRecord->patient->last_name }}</h1>

    <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Symptoms -->
        <div class="form-group">
            <label for="symptoms">Symptoms</label>
            <textarea name="symptoms" id="symptoms" class="form-control" rows="3" required>{{ $medicalRecord->symptoms }}</textarea>
        </div>

        <!-- Lab Tests -->
        <div class="form-group">
            <label for="lab_tests">Lab Tests</label>
            <select name="lab_tests[]" id="lab_tests" class="form-control" multiple>
                @foreach($labTests as $labTest)
                    <option value="{{ $labTest->id }}" @if(in_array($labTest->id, $medicalRecord->labTests->pluck('id')->toArray())) selected @endif>
                        {{ $labTest->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Medical Diagnoses -->
        <div class="form-group">
            <label for="medical_diagnoses">Medical Diagnoses</label>
            <select name="medical_diagnoses[]" id="medical_diagnoses" class="form-control" multiple>
                @foreach($diagnoses as $diagnosis)
                    <option value="{{ $diagnosis->id }}" @if(in_array($diagnosis->id, $medicalRecord->medicalDiagnoses->pluck('id')->toArray())) selected @endif>
                        {{ $diagnosis->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Treatment Given -->
        <div class="form-group">
            <label for="treatment_given">Treatment Given</label>
            <textarea name="treatment_given" id="treatment_given" class="form-control" rows="3" required>{{ $medicalRecord->treatment_given }}</textarea>
        </div>

        <!-- Outcome -->
        <div class="form-group">
            <label for="outcome">Outcome</label>
            <select name="outcome" id="outcome" class="form-control" required>
                <option value="admitted" @if($medicalRecord->outcome == 'admitted') selected @endif>Admitted</option>
                <option value="died" @if($medicalRecord->outcome == 'died') selected @endif>Died</option>
                <option value="referred" @if($medicalRecord->outcome == 'referred') selected @endif>Referred</option>
                <option value="discharged" @if($medicalRecord->outcome == 'discharged') selected @endif>Discharged</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Medical Record</button>
    </form>
</div>
@endsection
