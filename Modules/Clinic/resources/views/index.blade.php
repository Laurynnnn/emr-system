@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Clinics</h1>
        <a href="{{ route('clinics.create') }}" class="btn btn-primary mb-3">Add Clinic</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clinics as $clinic)
                    <tr>
                        <td><a href="{{ route('clinics.show', $clinic->id) }}">{{ $clinic->name }}</a></td>
                        <td>{{ $clinic->createdBy ? $clinic->createdBy->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('clinics.show', $clinic->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('clinics.edit', $clinic->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('clinics.destroy', $clinic->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if($clinic->trashed())
                                <form action="{{ route('clinics.reactivate', $clinic->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Reactivate</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $clinics->links() }}
    </div>
@endsection
