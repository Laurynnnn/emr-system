@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clinics</h1>
    <a href="{{ route('clinics.create') }}" class="btn btn-primary mb-3">Add Clinic</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clinics as $clinic)
            <tr>
                <td><a href="{{ route('clinics.show', $clinic->id) }}">{{ $clinic->name }}</a></td>
                <td>
                    <a href="{{ route('clinics.edit', $clinic->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
