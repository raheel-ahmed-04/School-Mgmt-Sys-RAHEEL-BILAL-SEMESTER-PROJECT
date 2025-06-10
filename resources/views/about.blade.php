<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - School Management System</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('school/css/home.css') }}" rel="stylesheet">
    <style>
        /* About page specific styles */
        .about-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .project-info {
            text-align: center;
            margin-bottom: 60px;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .project-info h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .project-info p {
            color: #666;
            font-size: 1.2em;
            line-height: 1.6;
        }

        .developers-section {
            margin-top: 40px;
        }

        .developers-section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-size: 2em;
        }

        .developers-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .developer-card {
            flex: 1;
            min-width: 300px;
            max-width: 400px;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .developer-card:hover {
            transform: translateY(-5px);
        }

        .developer-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 3px solid #FFC107;
        }

        .developer-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .developer-card h3 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }

        .developer-info {
            list-style: none;
            padding: 0;
        }

        .developer-info li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .developer-info li:last-child {
            border-bottom: none;
        }

        .developer-info li i {
            margin-right: 10px;
            color: #FFC107;
            width: 20px;
        }

        .developer-info a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .developer-info a:hover {
            color: #FFC107;
        }

        
    </style>
</head>
<body>
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/#features') }}">Features</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ url('/#contact') }}">Contact</a>
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

    <div class="about-container">
        <div class="project-info">
            <h1>About Our Project</h1>
            <p>This is WEB TECHNOLOGIES semester project made by two developers of Comsats University Islamabad, Wah campus 
               for submission to subject teacher Sir Ikram.</p>
               
               <div class="developers-section">
                   <div class="developers-grid">
                       <!-- Raheel Ahmed Card -->
                       <div class="developer-card">
                           <div class="developer-image">
                               <img src="{{ asset('images/developers/raheel.jpg') }}" alt="Raheel Ahmed">
                           </div>
                           <h3>Raheel Ahmed</h3>
                           <ul class="developer-info">
                               <li><i class="fas fa-id-card"></i> <strong>Roll No:</strong> FA22-BSE-077</li>
                               <li><i class="fas fa-graduation-cap"></i> <strong>Semester:</strong> 6</li>
                               <li><i class="fas fa-envelope"></i> <strong>Email:</strong> 
                            <a href="mailto:raheelqazi29@gmail.com">raheelqazi29@gmail.com</a>
                        </li>
                        <li><i class="fab fa-linkedin"></i> <strong>LinkedIn:</strong> 
                            <a href="https://www.linkedin.com/in/raheelahmad72" target="_blank">
                                linkedin.com/in/raheelahmad72
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Bilal Arshad Card -->
                <div class="developer-card">
                    <div class="developer-image">
                        <img src="{{ asset('images/developers/bilal.jpg') }}" alt="Bilal Arshad">
                    </div>
                    <h3>Bilal Arshad</h3>
                    <ul class="developer-info">
                        <li><i class="fas fa-id-card"></i> <strong>Roll No:</strong> FA22-BSE-045</li>
                        <li><i class="fas fa-graduation-cap"></i> <strong>Semester:</strong> 6</li>
                        <li><i class="fas fa-envelope"></i> <strong>Email:</strong> 
                        <a href="mailto:bilalarshd66@gmail.com">bilalarshd66@gmail.com</a>
                    </li>
                    <li><i class="fab fa-linkedin"></i> <strong>LinkedIn:</strong> 
                    <span>Not Available</span>
                </li>
            </ul>
        </div>
    </div>
</div>
        </div>
    </div>
    <footer>
        &copy; 2024 School Management System. All Rights Reserved.
    </footer>
</body>
</html>
