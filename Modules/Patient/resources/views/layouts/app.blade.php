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
            background-color: #f0f2f5; /* Light background color for the entire page */
        }
        .sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #535863; /* Light background color for the sidebar */
            border-right: 1px solid #ddd; /* Light border to separate the sidebar from the content */
        }
        .sidebar .nav-link {
            color: #fefcfc;
        }
        .sidebar .nav-link.active {
            background-color: #2e89e4;
            border-radius: 4px;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff; /* Ensure content area is also light to match the sidebar */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">EMR System</a>
        </div>
        <div class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Patients</a>
            <a class="nav-link {{ request()->routeIs('medical-records.*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Medical Records</a>
            <a class="nav-link {{ request()->routeIs('labs.*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Labs</a>
            <a class="nav-link {{ request()->routeIs('pharmacy.*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Pharmacy</a>
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
