<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #FFC107, #4CAF50);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 26px;
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid #4CAF50;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #FFC107;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.2);
        }

        .error {
            color: #d32f2f;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .checkbox input {
            margin-right: 10px;
        }

        .link {
            font-size: 14px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .link:hover {
            color: #4CAF50;
        }

        .button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #4CAF50, #FFC107);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background: linear-gradient(to right, #4CAF50, #333);
            transform: scale(1.02);
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="margin-bottom: 40px;">
            <a href="{{ route('home') }}" style="background:#4CAF50;color:#fff;padding:10px 22px;border-radius:6px;text-decoration:none;font-weight:500;box-shadow:0 2px 8px rgba(76,175,80,0.08);transition:background 0.2s;">&larr; Back </a>
        </div>
        <h1>Admin Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif

            <!-- Password -->
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif

            <!-- Login Button -->
            <button type="submit" class="button">Log in</button>

            <div style="margin-top: 20px; text-align: center;">
                already have an account?
                <a href="{{ route('register') }}" class="link">Register</a>
            </div>
        </form>
    </div>
</body>
</html>

