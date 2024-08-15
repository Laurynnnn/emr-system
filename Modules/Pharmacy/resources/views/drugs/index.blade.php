@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Drugs</h1>

        <a href="{{ route('drugs.create') }}" class="btn btn-primary mb-3">Add New Drug</a>

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
                    <th>Created By</th>
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
                        <td>{{ $drug->createdBy ? $drug->createdBy->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('drugs.show', $drug->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('drugs.edit', $drug->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @if($drug->trashed())
                                <form action="{{ route('drugs.reactivate', $drug->id) }}" method="POST" style="display:inline;">
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

        {{ $drugs->links() }}
    </div>
@endsection
