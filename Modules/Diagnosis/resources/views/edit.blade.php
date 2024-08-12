@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Diagnosis</h1>
        <form action="{{ route('diagnoses.update', $diagnosis) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $diagnosis->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="icd11_code">ICD11 Code</label>
                <input type="text" name="icd11_code" id="icd11_code" class="form-control" value="{{ old('icd11_code', $diagnosis->icd11_code) }}" required>
                @error('icd11_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
