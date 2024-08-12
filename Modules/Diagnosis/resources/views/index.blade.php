@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Diagnoses List</h1>
        <a href="{{ route('diagnoses.create') }}" class="btn btn-primary mb-3">Add New Diagnosis</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>ICD11 Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnoses as $diagnosis)
                    <tr>
                        <td>{{ $diagnosis->id }}</td>
                        <td>{{ $diagnosis->name }}</td>
                        <td>{{ $diagnosis->icd11_code }}</td>
                        <td>
                            <a href="{{ route('diagnoses.show', $diagnosis) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('diagnoses.edit', $diagnosis) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('diagnoses.destroy', $diagnosis) }}" method="POST" style="display:inline;">
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
