<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Church Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Montserrat", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f6fb;
        }

        .login-card {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-card img {
            height: 80px;
            width: 80px;
            border-radius: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        input:focus {
            border-color: #667eea;
            outline: none;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            color: #fff;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #5a67d8;
        }

        .error {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 5px;
        }

        .footer-text {
            text-align: center;
            margin-top: 18px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.jpg') }}" alt="Logo">
        </a>
    </h2>

    <!-- STATUS MESSAGE -->
    @if (session('status'))
        <p class="error">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label>Password</label>
            <div class="password-wrapper">
                <input id="password" type="password" name="password" required>
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit">Login</button>
    </form>

    <div class="footer-text">
        © {{ date('Y') }} Church Management System
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.querySelector('.toggle-password');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>

</body>
</html>