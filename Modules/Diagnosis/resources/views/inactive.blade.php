@extends('layouts.app')

@section('title', 'Inactive Diagnoses')

@section('content')
<div class="container">
    <h1>Inactive Diagnoses</h1>
    <a href="{{ route('diagnoses.index') }}" class="btn btn-primary mb-3">Back to Diagnoses</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>ICD-11 Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diagnoses as $diagnosis)
            <tr>
                <td>{{ $diagnosis->name }}</td>
                <td>{{ $diagnosis->icd11_code }}</td>
                <td>
                    <a href="{{ route('diagnoses.show_inactive', $diagnosis->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('diagnoses.reactivate', $diagnosis->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">Reactivate</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $diagnoses->links() }}
</div>
@endsection
