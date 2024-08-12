@extends('layouts.app')

@section('content')
<div class="mt-5">
    <h1>Create Patient</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="patientForm" action="{{ route('patients.store') }}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required minlength="2" maxlength="50">
                @error('first_name')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required minlength="2" maxlength="50">
                @error('last_name')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender" required>
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" maxlength="10" minlength="10" value="{{ old('phone_number') }}">
                @error('phone_number')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="next_of_kin_name">Next of Kin Name:</label>
                <input type="text" class="form-control" name="next_of_kin_name" id="next_of_kin_name" minlength="2" maxlength="50" value="{{ old('next_of_kin_name') }}" required>
                @error('next_of_kin_name')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="next_of_kin_relationship">Next of Kin Relationship:</label>
                <select class="form-control" name="next_of_kin_relationship" id="next_of_kin_relationship" required>
                    <option value="" disabled {{ old('next_of_kin_relationship') ? '' : 'selected' }}>Select relationship</option>
                    <option value="mother" {{ old('next_of_kin_relationship') == 'mother' ? 'selected' : '' }}>Mother</option>
                    <option value="father" {{ old('next_of_kin_relationship') == 'father' ? 'selected' : '' }}>Father</option>
                    <option value="brother" {{ old('next_of_kin_relationship') == 'brother' ? 'selected' : '' }}>Brother</option>
                    <option value="sister" {{ old('next_of_kin_relationship') == 'sister' ? 'selected' : '' }}>Sister</option>
                    <option value="daughter" {{ old('next_of_kin_relationship') == 'daughter' ? 'selected' : '' }}>Daughter</option>
                    <option value="son" {{ old('next_of_kin_relationship') == 'son' ? 'selected' : '' }}>Son</option>
                    <option value="uncle" {{ old('next_of_kin_relationship') == 'uncle' ? 'selected' : '' }}>Uncle</option>
                    <option value="aunt" {{ old('next_of_kin_relationship') == 'aunt' ? 'selected' : '' }}>Aunt</option>
                </select>
                @error('next_of_kin_relationship')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="next_of_kin_phone_number">Next of Kin Phone Number:</label>
                <input type="text" class="form-control" name="next_of_kin_phone_number" id="next_of_kin_phone_number" maxlength="10" minlength="10" value="{{ old('next_of_kin_phone_number') }}">
                @error('next_of_kin_phone_number')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Patient</button>
    </form>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var form = document.getElementById('patientForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>
@endsection
