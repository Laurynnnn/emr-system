@extends('layouts.app')

@section('title', 'Inactive Clinics')

@section('content')
<div class="container">
    <h1>Inactive Clinics</h1>
    <a href="{{ route('clinics.index') }}" class="btn btn-primary mb-3">Back to Clinics</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clinics as $clinic)
            <tr>
                <td>{{ $clinic->name }}</td>
                <td>
                    <a href="{{ route('clinics.show_inactive', $clinic->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('clinics.reactivate', $clinic->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">Reactivate</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clinics->links() }}
</div>
@endsection
