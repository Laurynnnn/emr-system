<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EMR System')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }
        .main-container {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: #535863;
            border-right: 1px solid #ddd;
            min-height: calc(100vh - 56px); /* Adjust based on the navbar height */
            position: relative;
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
        .navbar-brand {
            margin-right: 1rem;
        }
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }
        .breadcrumb-item a {
            color: #2e89e4;
        }
        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">EMR System</a>
        <div class="d-flex align-items-center ml-auto">
            @if(Auth::check())
                <div class="d-flex align-items-center">
                    <span class="navbar-text mr-2">{{ Auth::user()->name }}</span>
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle">
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-link">Login</a>
            @endif
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <div class="sidebar">
            @if(Auth::check())
            <div class="nav flex-column">
                <!-- Patients Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}" data-toggle="collapse" href="#patientsSubmenu" role="button" aria-expanded="{{ request()->routeIs('patients.*') ? 'true' : 'false' }}" aria-controls="patientsSubmenu">
                    <i class="fas fa-user-md"></i> Patients
                </a>
                <div class="collapse {{ request()->routeIs('patients.*') ? 'show' : '' }}" id="patientsSubmenu">
                    <a class="nav-link sub-link {{ request()->routeIs('patients.index') ? 'active' : '' }}" href="{{ route('patients.index') }}">Active Patients</a>
                    <a class="nav-link sub-link {{ request()->routeIs('patients.inactive') ? 'active' : '' }}" href="{{ route('patients.inactive') }}">Inactive Patients</a>
                    <a class="nav-link sub-link {{ request()->routeIs('patients.create') ? 'active' : '' }}" href="{{ route('patients.create') }}">Create Patient</a>
                </div>

                <!-- Lab Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('lab_tests.*') ? 'active' : '' }}" data-toggle="collapse" href="#labSubmenu" role="button" aria-expanded="{{ request()->routeIs('lab_tests.*') ? 'true' : 'false' }}" aria-controls="labSubmenu">
                    <i class="fas fa-flask"></i> Lab
                </a>
                <div class="collapse {{ request()->routeIs('lab_tests.*') ? 'show' : '' }}" id="labSubmenu">
                    <a class="nav-link sub-link {{ request()->routeIs('lab_tests.create') ? 'active' : '' }}" href="{{ route('lab_tests.create') }}">Create Lab Test</a>
                    <a class="nav-link sub-link {{ request()->routeIs('lab_tests.index') ? 'active' : '' }}" href="{{ route('lab_tests.index') }}">View Lab Tests</a>
                    <a class="nav-link sub-link {{ request()->routeIs('lab_tests.inactive') ? 'active' : '' }}" href="{{ route('lab_tests.inactive') }}">Inactive Lab Tests</a>
                </div>

                <!-- Pharmacy Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('drugs.*') ? 'active' : '' }}" data-toggle="collapse" href="#pharmacySubmenu" role="button" aria-expanded="{{ request()->routeIs('drugs.*') ? 'true' : 'false' }}" aria-controls="pharmacySubmenu">
                    <i class="fas fa-capsules"></i> Pharmacy
                </a>
                <div class="collapse {{ request()->routeIs('drugs.*') ? 'show' : '' }}" id="pharmacySubmenu">
                    <a class="nav-link sub-link {{ request()->routeIs('drugs.create') ? 'active' : '' }}" href="{{ route('drugs.create') }}">Add Drug</a>
                    <a class="nav-link sub-link {{ request()->routeIs('drugs.index') ? 'active' : '' }}" href="{{ route('drugs.index') }}">View Drugs</a>
                    <a class="nav-link sub-link {{ request()->routeIs('drugs.inactive') ? 'active' : '' }}" href="{{ route('drugs.inactive') }}">Inactive Drugs</a>
                </div>

                <!-- Clinics Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('clinics.*') ? 'active' : '' }}" data-toggle="collapse" href="#clinicsSubmenu" role="button" aria-expanded="{{ request()->routeIs('clinics.*') ? 'true' : 'false' }}" aria-controls="clinicsSubmenu">
                    <i class="fas fa-clinic-medical"></i> Clinics
                </a>
                <div class="collapse {{ request()->routeIs('clinics.*') ? 'show' : '' }}" id="clinicsSubmenu">   
                    <a class="nav-link sub-link {{ request()->routeIs('clinics.create') ? 'active' : '' }}" href="{{ route('clinics.create') }}">Add Clinic</a>
                    <a class="nav-link sub-link {{ request()->routeIs('clinics.index') ? 'active' : '' }}" href="{{ route('clinics.index') }}">View Clinics</a>
                    <a class="nav-link sub-link {{ request()->routeIs('clinics.inactive') ? 'active' : '' }}" href="{{ route('clinics.inactive') }}">Inactive Clinics</a>
                </div>

                <!-- Diagnoses Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('diagnoses.*') ? 'active' : '' }}" data-toggle="collapse" href="#diagnosesSubmenu" role="button" aria-expanded="{{ request()->routeIs('diagnoses.*') ? 'true' : 'false' }}" aria-controls="diagnosesSubmenu">
                    <i class="fas fa-stethoscope"></i> Diagnoses
                </a>
                <div class="collapse {{ request()->routeIs('diagnoses.*') ? 'show' : '' }}" id="diagnosesSubmenu">
                    <a class="nav-link sub-link {{ request()->routeIs('diagnoses.create') ? 'active' : '' }}" href="{{ route('diagnoses.create') }}">Add Diagnosis</a>
                    <a class="nav-link sub-link {{ request()->routeIs('diagnoses.index') ? 'active' : '' }}" href="{{ route('diagnoses.index') }}">View Diagnoses</a>
                    <a class="nav-link sub-link {{ request()->routeIs('diagnoses.inactive') ? 'active' : '' }}" href="{{ route('diagnoses.inactive') }}">Inactive Diagnoses</a>
                </div>

                <!-- Users Main Link with Sub-links -->
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" data-toggle="collapse" href="#usersSubmenu" role="button" aria-expanded="{{ request()->routeIs('users.*') ? 'true' : 'false' }}" aria-controls="usersSubmenu">
                    <i class="fas fa-users"></i> Users
                </a>
                <div class="collapse {{ request()->routeIs('users.*') ? 'show' : '' }}" id="usersSubmenu">
                    <a class="nav-link sub-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Active Users</a>
                    <a class="nav-link sub-link {{ request()->routeIs('users.inactive') ? 'active' : '' }}" href="{{ route('users.inactive') }}">Inactive Users</a>
                    <a class="nav-link sub-link {{ request()->routeIs('users.create') ? 'active' : '' }}" href="{{ route('users.create') }}">Add User</a>
                </div>

                <!-- Logout Button -->
                @if(Auth::check())
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-light">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
                @endif
            </div>
            @endif
        </div>
        <div class="content">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @yield('breadcrumbs')
                </ol>
            </nav>
            
            <!-- Main Content -->
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
