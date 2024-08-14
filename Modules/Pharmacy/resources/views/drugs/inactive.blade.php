@extends('layouts.app')

@section('title', 'Inactive Drugs')

@section('content')
<div class="container">
    <h1 class="mb-4">Inactive Drugs</h1>
    <a href="{{ route('drugs.index') }}" class="btn btn-primary mb-3">Back to Drugs</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand Name</th>
                <th>Form</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drugs as $drug)
            <tr>
                <td>{{ $drug->name }}</td>
                <td>{{ $drug->brand_name }}</td>
                <td>{{ $drug->form }}</td>
                <td>{{ $drug->code }}</td>
                <td>
                    <form action="{{ route('drugs.reactivate', $drug->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to reactivate this drug?')">Reactivate</button>
                    </form>
                    <a href="{{ route('drugs.show', $drug->id) }}" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $drugs->links() }}
</div>
@endsection
