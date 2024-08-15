@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lab Tests</h1>
        <a href="{{ route('lab_tests.create') }}" class="btn btn-primary mb-3">Add New Lab Test</a>
        <div class="card">
            <div class="card-body">
                @if($labTests->isEmpty())
                    <p>No lab tests found.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Duration (minutes)</th>
                                <th>Authenticated</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($labTests as $labTest)
                                <tr>
                                    <td>{{ $labTest->name }}</td>
                                    <td>{{ $labTest->duration }}</td>
                                    <td>{{ $labTest->authenticated ? 'Yes' : 'No' }}</td>
                                    <td>{{ $labTest->createdBy ? $labTest->createdBy->name : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('lab_tests.show', $labTest) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('lab_tests.edit', $labTest) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('lab_tests.destroy', $labTest) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
