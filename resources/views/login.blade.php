<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome link -->
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Body Style */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0; /* Fallback for older browsers */
        }

        /* Login Container */
        .login-container {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Background for login container */
            height: 100vh; /* Full viewport height */
            display: flex; /* Flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        /* Login Form */
        .login-form {
            background: #ffffff; /* Background for form */
            padding: 40px; /* Padding for form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Shadow effect */
            width: 100%; /* Full width */
            max-width: 400px; /* Maximum width */
            transition: transform 0.3s; /* Transition for hover effect */
        }

        /* Hover Effect */
        .login-form:hover {
            transform: translateY(-5px); /* Hover effect */
        }

        /* Heading */
        h2 {
            text-align: center; /* Center text */
            margin-bottom: 20px; /* Bottom margin */
            color: #333; /* Text color */
            font-weight: bold; /* Bold text */
        }

        /* Input Group */
        .input-group {
            position: relative; /* Position for icon */
            margin-bottom: 20px; /* Bottom margin */
        }

        /* Icon Positioning */
        .input-group i {
            position: absolute; /* Absolute positioning */
            left: 10px; /* Position from left */
            top: 12px; /* Position from top */
            color: #999; /* Icon color */
        }

        /* Input Fields */
        input[type="email"],
        input[type="password"] {
            width: 100%; /* Full width */
            padding: 10px 35px; /* Padding with space for icon */
            border: 1px solid #ccc; /* Border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            transition: border-color 0.3s; /* Transition for border color */
            box-sizing: border-box; /* Ensure padding is included in width */
        }

        /* Input Focus Style */
        input:focus {
            border-color: #6a11cb; /* Border color on focus */
            outline: none; /* Remove outline */
        }

        /* Button Style */
        button {
            width: 100%; /* Full width */
            padding: 10px; /* Padding */
            background-color: #6a11cb; /* Button color */
            color: white; /* Text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            font-size: 18px; /* Font size */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s, transform 0.2s; /* Transition for hover effect */
        }

        /* Button Hover Effect */
        button:hover {
            background-color: #2575fc; /* Button hover color */
            transform: translateY(-2px); /* Hover effect */
        }

        /* Footer Style */
        .footer {
            text-align: center; /* Center footer text */
            margin-top: 20px; /* Top margin */
        }

        /* Footer Link Style */
        .footer .link {
            margin: 5px 0; /* Margin for link */
        }

        /* Footer Link */
        .footer a {
            color: #6a11cb; /* Link color */
            text-decoration: none; /* No underline */
            transition: color 0.3s; /* Transition for color change */
        }

        /* Footer Link Hover Effect */
        .footer a:hover {
            color: #2575fc; /* Link hover color */
            text-decoration: underline; /* Underline on hover */
        }

        .error-message {
            background-color: #ffdddd; /* Light red background */
            color: #d8000c; /* Dark red text */
            border: 1px solid #d8000c; /* Dark red border */
            padding: 10px; /* Padding around the message */
            margin-bottom: 20px; /* Margin below the error message */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>
<body>
    <div class="login-container"> <!-- This class will help scope the CSS -->
        <form class="login-form" action="{{ route('userLogin') }}" method="POST">
            @csrf
            <h2>Welcome Back</h2> <!-- Optional Heading -->

             @if ($errors->any())
                <div class="error-message">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach

                </div>
            @endif

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
            <div class="footer">
                <p class="link"><a href="#">Forgot Password?</a></p>
            </div>
        </form>
    </div>
</body>
</html>
