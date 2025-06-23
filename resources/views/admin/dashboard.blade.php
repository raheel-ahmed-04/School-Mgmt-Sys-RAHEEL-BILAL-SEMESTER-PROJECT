<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('school/css/admindashboard.css') }}" rel="stylesheet">
    <style>
        
        .btn-register {
            background: #1976d2;
            color: #fff;
            padding: 8px 18px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            margin-left: 10px;
            transition: background 0.2s;
        }
        .btn-register:hover {
            background: #125ea2;
        }
    </style>
</head>
<body>
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            @if(Auth::check())
                <a href="{{ route('register') }}" class="btn-register">Register New Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        <div class="welcome-section" style="max-width:900px;margin:40px auto 0 auto;background:#fff;border-radius:12px;box-shadow:0 4px 24px rgba(0,0,0,0.08);padding:32px;">
            <h2 style="color:#4CAF50;">Welcome to the School Management System</h2>
            <p style="color:#333;">
                Streamline your school's management processes with ease. Access information about students, teachers, classes, and more in one unified system.
            </p>
        </div>

        <div class="container py-4" style="max-width:900px;margin:32px auto;background:#fff;border-radius:12px;box-shadow:0 4px 24px rgba(0,0,0,0.08);padding:32px;">
            <h2 style="color:#4CAF50;">Admin Dashboard</h2>
            <div class="row mb-4" style="display:flex;gap:24px;justify-content:space-between;">
                <div class="card text-center" style="flex:1;background:#f8f9fa;border-radius:10px;box-shadow:0 2px 8px rgba(76,175,80,0.08);padding:24px;border-left:5px solid #4CAF50;margin-bottom:0;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#388e3c;">Total Students</h5>
                        <p class="card-text display-4" style="font-size:2.2rem;font-weight:bold;">{{ $total_students }}</p>
                        <a href="{{ route('admin.student') }}" class="btn btn-primary" style="background:#4CAF50;color:#fff;border:none;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;transition:background 0.2s;">Manage Students</a>
                    </div>
                </div>
                <div class="card text-center" style="flex:1;background:#f8f9fa;border-radius:10px;box-shadow:0 2px 8px rgba(76,175,80,0.08);padding:24px;border-left:5px solid #4CAF50;margin-bottom:0;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#388e3c;">Total Teachers</h5>
                        <p class="card-text display-4" style="font-size:2.2rem;font-weight:bold;">{{ $total_teachers }}</p>
                        <a href="{{ route('admin.teacher') }}" class="btn btn-primary" style="background:#4CAF50;color:#fff;border:none;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;transition:background 0.2s;">Manage Teachers</a>
                    </div>
                </div>
                <div class="card text-center" style="flex:1;background:#f8f9fa;border-radius:10px;box-shadow:0 2px 8px rgba(76,175,80,0.08);padding:24px;border-left:5px solid #4CAF50;margin-bottom:0;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#388e3c;">Total Classes</h5>
                        <p class="card-text display-4" style="font-size:2.2rem;font-weight:bold;">{{ $total_classes }}</p>
                        <a href="{{ route('admin.class') }}" class="btn btn-primary" style="background:#4CAF50;color:#fff;border:none;padding:8px 18px;border-radius:4px;text-decoration:none;font-weight:500;transition:background 0.2s;">Manage Classes</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 School Management System. All Rights Reserved.
    </footer>
</body>
</html>
