<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('school/css/home.css') }}" rel="stylesheet">
    <style>
        .features-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .features-heading {
            text-align: center;
            margin-bottom: 50px;
            color: #333;
        }
        .login-btn {
            background-color: #FFC107;
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            margin-left: 10px;
            transition: background 0.3s;
        }
        .login-btn:hover {
            background-color: #FFD54F;
        }
        .contact-section {
            padding: 80px 0;
            background-color: #fff;
            text-align: center;
        }
        .contact-info {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .contact-info h2 {
            color: #333;
            margin-bottom: 30px;
        }
        .contact-item {
            margin: 20px 0;
            font-size: 18px;
        }
        .contact-item i {
            margin-right: 10px;
            color: #FFC107;
        }
        .contact-item a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .contact-item a:hover {
            color: #FFC107;
        }
    </style>
</head>
<body>
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#features">Features</a>
            <a href="{{ route('about') }}">About</a>
            <a href="#contact">Contact</a>
            @if (Auth::check())
                <a href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            @endif
        </nav>
    </header>

    <div class="hero">
        <h1>Effortless School Management</h1>
        <p>Empowering schools to manage students, teachers, classes, and more with a unified and user-friendly system.</p>
        <br><br>
        <a href="#">Get Started</a>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <h2 class="features-heading">Core Features</h2>
        <div class="features">
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Students Icon">
                <h3>Student Management</h3>
                <p>Add, edit, and remove students. View all student records and assign them to classes.</p>
            </div>
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" alt="Teachers Icon">
                <h3>Teacher Management</h3>
                <p>Manage teacher profiles, assign each teacher to a class, and update their information.</p>
            </div>
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1387/1387339.png" alt="Classes Icon">
                <h3>Class Management</h3>
                <p>Create, edit, and delete classes. Assign a single teacher to each class and manage class rosters.</p>
            </div>
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Admin Icon">
                <h3>Admin-Only Access</h3>
                <p>All management features are protected and accessible only to authenticated admin users.</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="contact-section">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                Email: <a href="mailto:contact@schoolmanagement.com">contact@schoolmanagement.com</a>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                Phone: <a href="tel:+923001234567">+92 300 1234567</a>
            </div>
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
