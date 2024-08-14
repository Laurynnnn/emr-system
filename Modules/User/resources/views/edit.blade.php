@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container mt-5">
    <h1>Edit User</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password (Leave blank to keep current password)</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="doctor" {{ old('role', $user->role) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                        <option value="nurse" {{ old('role', $user->role) == 'nurse' ? 'selected' : '' }}>Nurse</option>
                        <option value="surgeon" {{ old('role', $user->role) == 'surgeon' ? 'selected' : '' }}>Surgeon</option>
                        <option value="lab_technician" {{ old('role', $user->role) == 'lab_technician' ? 'selected' : '' }}>Lab Technician</option>
                        <option value="administrator" {{ old('role', $user->role) == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="pharmacist" {{ old('role', $user->role) == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Users List</a>
</div>
@endsection
