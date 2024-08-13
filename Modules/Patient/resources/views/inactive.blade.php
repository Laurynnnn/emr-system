@extends('layouts.app')

@section('title', 'Inactive Patients')

@section('content')
<div class="container">
    <h1>Inactive Patients</h1>
    <a href="{{ route('patients.index') }}" class="btn btn-primary mb-3">Back to Patients</a>
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
                    <form action="{{ route('patients.reactivate', $patient->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reactivate this patient?')">Activate</button>
                    </form>
                    <a href="{{ route('patients.show_inactive', $patient->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
