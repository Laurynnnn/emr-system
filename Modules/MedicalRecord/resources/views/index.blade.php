@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Medical Records for Patient: {{ $patient->first_name }} {{ $patient->last_name }}</h1>

    <a href="{{ route('medical_records.create', ['patient_id' => $patient->id]) }}" class="btn btn-primary mb-3">Create New Medical Record</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Symptoms</th>
                <th>Treatment</th>
                <th>Outcome</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicalRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->doctor->name }}</td>
                    <td>{{ Str::limit($record->symptoms, 50) }}</td>
                    <td>{{ Str::limit($record->treatment_given, 50) }}</td>
                    <td>{{ $record->outcome }}</td>
                    <td>{{ $record->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('medical_records.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
