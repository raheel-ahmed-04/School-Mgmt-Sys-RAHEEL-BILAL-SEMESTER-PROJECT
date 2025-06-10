<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('school/css/home.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Features</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
                    @else
                        <a href="{{ url('/teacher/dashboard') }}">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" 
                       style="background-color: #FFC107; color: #333; padding: 10px 20px; text-decoration: none; border-radius: 20px; font-weight: bold; margin-left: 10px; transition: all 0.3s ease;"
                       onmouseover="this.style.backgroundColor='#FFD54F';" 
                       onmouseout="this.style.backgroundColor='#FFC107';">
                       Login
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           style="background-color: #FFC107; color: #333; padding: 10px 20px; text-decoration: none; border-radius: 20px; font-weight: bold; margin-left: 10px; transition: all 0.3s ease;"
                           onmouseover="this.style.backgroundColor='#FFD54F';" 
                           onmouseout="this.style.backgroundColor='#FFC107';">
                           Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <div class="hero">
        <h1>Effortless School Management</h1>
        <p>Empowering schools to manage students, teachers, classes, and more with a unified and user-friendly system.</p>
        <br><br>
        <a href="#">Get Started</a>
    </div>

    <div class="features">
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Students Icon">
            <h3>Student Management</h3>
            <p>Track student attendance, grades, and performance effortlessly.</p>
        </div>
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" alt="Teachers Icon">
            <h3>Teacher Management</h3>
            <p>Organize teacher schedules and track subject assignments efficiently.</p>
        </div>
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1387/1387339.png" alt="Classes Icon">
            <h3>Class Scheduling</h3>
            <p>Plan classes, timetables, and resources seamlessly.</p>
        </div>
    </div>

    <div class="cta">
        <h2>Ready to Transform Your School?</h2>
        <br>
        <a href="#">Get Started Today</a>
    </div>

    <footer>
        &copy; 2024 School Management System. All Rights Reserved.
    </footer>
</body>
</html>
