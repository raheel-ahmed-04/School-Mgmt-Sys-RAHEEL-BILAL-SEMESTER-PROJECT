<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('school/css/teacherdashboard.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Teacher Dashboard</h2>
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            @if($isTeacher)
                <li><a href="/teacher/timetable">Timetable</a></li>
                <li><a href="/teacher/{{$teacher->id}}/attendance">Attendance </a></li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header>
            <div class="header-content">
                <h1>Welcome, Teacher</h1>
                <div class="user-info">
                    <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Teacher" class="profile-img">
                    <span>{{ $user->name }}</span>
                </div>
            </div>
        </header>
        @if($isTeacher)
        <!-- Dashboard Content -->
            <section class="dashboard-section">
                <div class="card">
                    <h3>My Timetable</h3>
                    <p>View your class schedule for the week. Enjoy your Week</p>
                    <button onclick="window.location.href='{{ route('teacher.mytimetable', ['teacherId' => $teacher->id]) }}'">
                        View Timetable
                    </button>
                </div>
                <div class="card">
                    <h3>Assigned Classes</h3>
                    <p>View and manage the classes assigned to you.</p>
                    <button onclick="window.location.href='{{ route('teacher.assignclass', ['teacherId' => $teacher->id]) }}'">
                        View Assigned Classes
                    </button>
                </div>   
            </section>
        @else
            <div class="access-denied">
                <h3>Access Denied</h3>
                <p>Your email is not the same as the one you provided to the school.</p>
                <p>You are not added yet by the admin. If you want to access the data, please ask your admin to add you.</p>
            </div>
        @endif
    </div>

   
</body>
</html>
