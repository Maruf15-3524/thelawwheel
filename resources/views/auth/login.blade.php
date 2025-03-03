<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{asset('logo.png') }}"type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome for icons -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("{{ asset('bg2.jpg') }}");
            background-size: cover; /* Make sure the image covers the entire background */
            background-position: center; /* Center the background image */
            background-attachment: fixed; /* Keeps the background fixed while scrolling */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 380px;
            width: 100%;
            padding: 30px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .login-container h2 {
            font-size: 26px;
            font-weight: 600;
            color: #1f3b4d;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding-left: 20px;
            height: 45px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .form-control:focus {
            border-color: #1f3b4d;
            box-shadow: 0 0 8px rgba(31, 59, 77, 0.4);
        }

        .btn-primary {
            background-color: #1f3b4d;
            border-color: #1f3b4d;
            border-radius: 25px;
            padding: 12px 30px;
            font-size: 16px;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #16304a;
            border-color: #16304a;
        }

        .form-check-label {
            font-size: 14px;
        }

        .forgot-password {
            font-size: 14px;
            color: #1f3b4d;
            text-align: right;
            display: block;
            margin-top: 10px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .form-footer {
            margin-top: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Eye icon for showing password inside the input field */
        .password-container {
            position: relative;
        }

        .password-icon {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 70%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #aaa;
        }

        /* Responsive adjustments for small and medium devices */
        @media (max-width: 768px) {
            body {
                justify-content: center; /* Align the login form to the top */
                padding-top: 50px; /* Add padding to the top to avoid overlap with navbar */
            }

            .login-container {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>POS System Login</h2>

        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <!-- Username or Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Username or Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="admin@gmail.com"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="your@email.com"
                       required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password Input with Show/Hide Feature -->
            <div class="mb-3 password-container">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       value="12345678"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter your password"
                       required>
                <!-- Eye icon to toggle password visibility -->
                <i class="fa fa-eye password-icon" id="togglePassword" onclick="togglePassword()"></i>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Remember Me Checkbox and Forgot Password Link -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Log In</button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const passwordIcon = document.getElementById("togglePassword");

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Show password
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password"; // Hide password
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>
