<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            font-size: 24px;
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .info-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.5;
            text-align: center;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid #4CAF50;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus {
            outline: none;
            border-color: #FFC107;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.2);
        }

        .error {
            color: #d32f2f;
            font-size: 12px;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <p class="info-text">Forgot your password? No problem. Enter your email address below, and we will send you a password reset link to choose a new one.</p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="info-text" style="color: green;">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif

            <!-- Submit Button -->
            <button type="submit" class="button">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>
