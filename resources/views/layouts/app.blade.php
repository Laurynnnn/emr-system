<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EMR System')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
        }
        .sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #535863;
            border-right: 1px solid #ddd;
        }
        .sidebar .nav-link {
            color: #fefcfc;
        }
        .sidebar .nav-link.active {
            background-color: #2e89e4;
            border-radius: 4px;
        }
        .sidebar .nav-link.sub-link {
            padding-left: 30px;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">EMR System</a>
        </div>
        <div class="nav flex-column">
            <!-- Patients Main Link with Sub-links -->
            <a class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}" data-toggle="collapse" href="#patientsSubmenu" role="button" aria-expanded="{{ request()->routeIs('patients.*') ? 'true' : 'false' }}" aria-controls="patientsSubmenu">
                Patients
            </a>
            <div class="collapse {{ request()->routeIs('patients.*') ? 'show' : '' }}" id="patientsSubmenu">
                <a class="nav-link sub-link {{ request()->routeIs('patients.index') ? 'active' : '' }}" href="{{ route('patients.index') }}">Active Patients</a>
                <a class="nav-link sub-link {{ request()->routeIs('patients.inactive') ? 'active' : '' }}" href="{{ route('patients.inactive') }}">Inactive Patients</a>
                <a class="nav-link sub-link {{ request()->routeIs('patients.create') ? 'active' : '' }}" href="{{ route('patients.create') }}">Create Patient</a>
            </div>
            
            <!-- Lab Main Link with Sub-links -->
            <a class="nav-link {{ request()->routeIs('lab_tests.*') ? 'active' : '' }}" data-toggle="collapse" href="#labSubmenu" role="button" aria-expanded="{{ request()->routeIs('lab_tests.*') ? 'true' : 'false' }}" aria-controls="labSubmenu">
                Lab
            </a>
            <div class="collapse {{ request()->routeIs('lab_tests.*') ? 'show' : '' }}" id="labSubmenu">
                <a class="nav-link sub-link {{ request()->routeIs('lab_tests.index') ? 'active' : '' }}" href="{{ route('lab_tests.index') }}">View Lab Tests</a>
                <a class="nav-link sub-link {{ request()->routeIs('lab_tests.create') ? 'active' : '' }}" href="{{ route('lab_tests.create') }}">Create Lab Test</a>
                <a class="nav-link sub-link {{ request()->routeIs('patients.inactive') ? 'active' : '' }}" href="{{ route('patients.inactive') }}">Inactive Patients</a>
            </div>

            <!-- Pharmacy Main Link with Sub-links -->
            <a class="nav-link {{ request()->routeIs('drugs.*') ? 'active' : '' }}" data-toggle="collapse" href="#pharmacySubmenu" role="button" aria-expanded="{{ request()->routeIs('drugs.*') ? 'true' : 'false' }}" aria-controls="pharmacySubmenu">
                Pharmacy
            </a>
            <div class="collapse {{ request()->routeIs('drugs.*') ? 'show' : '' }}" id="pharmacySubmenu">
                <a class="nav-link sub-link {{ request()->routeIs('drugs.create') ? 'active' : '' }}" href="{{ route('drugs.create') }}">Add Drug</a>
                <a class="nav-link sub-link {{ request()->routeIs('drugs.index') ? 'active' : '' }}" href="{{ route('drugs.index') }}">View Drugs</a>
                <a class="nav-link sub-link {{ request()->routeIs('drugs.inactive') ? 'active' : '' }}" href="{{ route('drugs.inactive') }}">Inactive Drugs</a>
            </div>

            <!-- Clinics Main Link with Sub-links -->
            <a class="nav-link {{ request()->routeIs('clinics.*') ? 'active' : '' }}" data-toggle="collapse" href="#clinicsSubmenu" role="button" aria-expanded="{{ request()->routeIs('clinics.*') ? 'true' : 'false' }}" aria-controls="clinicsSubmenu">
                Clinics
            </a>
            <div class="collapse {{ request()->routeIs('clinics.*') ? 'show' : '' }}" id="clinicsSubmenu">   
                <a class="nav-link sub-link {{ request()->routeIs('clinics.create') ? 'active' : '' }}" href="{{ route('clinics.create') }}">Add Clinic</a>
                <a class="nav-link sub-link {{ request()->routeIs('clinics.index') ? 'active' : '' }}" href="{{ route('clinics.index') }}">View Clinics</a>
                <a class="nav-link sub-link {{ request()->routeIs('clinics.inactive') ? 'active' : '' }}" href="{{ route('clinics.inactive') }}">Inactive Clinics</a>
            </div>

            <!-- Diagnoses Main Link with Sub-links -->
            <a class="nav-link {{ request()->routeIs('diagnoses.*') ? 'active' : '' }}" data-toggle="collapse" href="#diagnosesSubmenu" role="button" aria-expanded="{{ request()->routeIs('diagnoses.*') ? 'true' : 'false' }}" aria-controls="diagnosesSubmenu">
                Diagnoses
            </a>
            <div class="collapse {{ request()->routeIs('diagnoses.*') ? 'show' : '' }}" id="diagnosesSubmenu">
                <a class="nav-link sub-link {{ request()->routeIs('diagnoses.create') ? 'active' : '' }}" href="{{ route('diagnoses.create') }}">Add Diagnosis</a>
                <a class="nav-link sub-link {{ request()->routeIs('diagnoses.index') ? 'active' : '' }}" href="{{ route('diagnoses.index') }}">View Diagnoses</a>
                <a class="nav-link sub-link {{ request()->routeIs('diagnoses.inactive') ? 'active' : '' }}" href="{{ route('diagnoses.inactive') }}">Inactive Diagnoses</a>
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
