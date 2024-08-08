@extends('patient::layouts.app')

@section('title', 'Patients')

@section('content')
<div class="container">
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add New Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient Number</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Next of Kin Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->patient_number }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ ucfirst($patient->gender) }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->phone_number }}</td>
                <td>{{ $patient->next_of_kin_name }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
