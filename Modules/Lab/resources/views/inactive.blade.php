@extends('layouts.app')

@section('title', 'Inactive Lab Tests')

@section('content')
<div class="container">
    <h1>Inactive Lab Tests</h1>
    <a href="{{ route('lab_tests.index') }}" class="btn btn-primary mb-3">Back to Lab Tests</a>
    <div class="card">
        <div class="card-body">
            @if($labTests->isEmpty())
                <p>No inactive lab tests found.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Duration (minutes)</th>
                            <th>Authenticated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($labTests as $labTest)
                            <tr>
                                <td>{{ $labTest->name }}</td>
                                <td>{{ $labTest->duration }}</td>
                                <td>{{ $labTest->authenticated ? 'Yes' : 'No' }}</td>
                                <td>
                                    <form action="{{ route('lab_tests.reactivate', $labTest->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to reactivate this lab test?')">Reactivate</button>
                                    </form>
                                    <a href="{{ route('lab_tests.show', $labTest) }}" class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
