<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('school/css/admindashboard.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>       
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
                
        </nav>
    </header>

    <main>
        <div class="welcome-section">
            <h2>Welcome to the School Management System</h2>
            <p>
                Streamline your school’s management processes with ease. Access information about students, teachers, classes, and more in one unified system.
            </p>
        </div>

        <div class="sections">
            
            <div class="section-card">
                <a href="/admin/subject">
                    <img src="https://images.pexels.com/photos/4306703/pexels-photo-4306703.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Subject X">
                    <h3>Subjects</h3>
                    <p>Manage and assign lessons, exams, and activities for Subject.</p>
                    Learn More &rarr;
                </a>
            </div>
            <div class="section-card">
                <a href="/admin/teachers">
                    <img src="https://images.pexels.com/photos/5212345/pexels-photo-5212345.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Teachers">
                    <h3>Teachers</h3>
                    <p>Manage teacher profiles, schedules, and subject assignments.</p>
                    Learn More &rarr;
                </a>
            </div>
            <div class="section-card">
                <a href="/admin/class">
                    <img src="https://images.pexels.com/photos/6693375/pexels-photo-6693375.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Classes">
                    <h3>Classes</h3>
                    <p>Organize class schedules, subjects, and timetables efficiently.</p>
                    Learn More &rarr;
                </a>
            </div>
            <div class="section-card">
                <a href="/admin/classwisesubject">
                <img src="https://images.pexels.com/photos/1550337/pexels-photo-1550337.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Class-wise Subjects">
                    <h3>Class-wise Subjects</h3>
                    <p>Manage subjects assigned to each class</p>
                    Learn More &rarr;
                </a>
            </div>
            <div class="section-card">
                <a href="/admin/student">
                    <img src="https://images.pexels.com/photos/3184398/pexels-photo-3184398.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Students">
                    <h3>Students</h3>
                    <p>Manage student details, attendance, grades, and records.</p>
                    Learn More &rarr;
                </a>
            </div>
            <div class="section-card">
                <a href="/admin/timetable">
                <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Time Table">
                    <h3>Time Table</h3>
                    <p>View and manage class schedules, teacher assignments, and exam timings.</p>
                    Learn More &rarr;
                </a>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 School Management System. All Rights Reserved.
    </footer>
</body>
</html>
