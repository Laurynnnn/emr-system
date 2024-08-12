@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add New Drug</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('drugs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{ old('brand_name') }}">
            </div>

            <div class="form-group">
                <label for="form">Form</label>
                <input type="text" name="form" id="form" class="form-control" value="{{ old('form') }}">
            </div>

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
