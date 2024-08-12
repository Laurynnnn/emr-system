@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Medical Record #{{ $medicalRecord->id }} for Patient: {{ $medicalRecord->patient->first_name }} {{ $medicalRecord->patient->last_name }}</h1>

    <div class="card">
        <div class="card-header">
            <strong>Doctor:</strong> {{ $medicalRecord->doctor->name }}
        </div>
        <div class="card-body">
            <p><strong>Symptoms:</strong> {{ $medicalRecord->symptoms }}</p>
            <p><strong>Lab Tests:</strong> 
                @foreach($medicalRecord->labTests as $labTest)
                    <span class="badge badge-info">{{ $labTest->name }}</span>
                @endforeach
            </p>
            <p><strong>Medical Diagnoses:</strong> 
                @foreach($medicalRecord->medicalDiagnoses as $diagnosis)
                    <span class="badge badge-success">{{ $diagnosis->name }}</span>
                @endforeach
            </p>
            <p><strong>Treatment Given:</strong> {{ $medicalRecord->treatment_given }}</p>
            <p><strong>Outcome:</strong> {{ $medicalRecord->outcome }}</p>
            <p><strong>Created At:</strong> {{ $medicalRecord->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('medical_records.edit', $medicalRecord->id) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('medical_records.index', ['patient_id' => $medicalRecord->patient_id]) }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
