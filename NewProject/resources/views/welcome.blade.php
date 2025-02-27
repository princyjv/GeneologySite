<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel</title>

    <!-- Google Font (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Direct Link to Your CSS File (No Mix Manifest Needed) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        header {
            background-color: #2b6cb0;
            color: #fff;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 28px;
            font-weight: 600;
        }

        .buttons a {
            display: inline-block;
            padding: 12px 20px;
            margin-left: 15px;
            border-radius: 6px;
            background-color: #fff;
            color: #3182ce;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }

        .buttons a:hover {
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        .buttons a:active {
            transform: translateY(0);
        }

        /* Main Container */
        .container {
            max-width: 500px;
            width: 100%;
            background-color: #fff;
            padding: 40px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 12px 50px rgba(0, 0, 0, 0.15);
        }

        h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #999;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            header h1 {
                font-size: 24px;
            }

            .buttons a {
                padding: 10px 18px;
                font-size: 14px;
            }

            .container {
                padding: 30px;
                margin: 40px auto;
            }

            h2 {
                font-size: 30px;
            }

            p {
                font-size: 16px;
                margin-bottom: 25px;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 20px;
            }

            .container {
                padding: 20px;
            }

            h2 {
                font-size: 26px;
            }

            p {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .buttons a {
                padding: 8px 16px;
                font-size: 12px;
                margin-left: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Header with Login/Register Buttons -->
    <header>
        <h1>Laravel App</h1>
        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" role="button" aria-label="Go to Dashboard">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" role="button" aria-label="Login">Login</a>
                    <a href="{{ route('register') }}" role="button" aria-label="Register">Register</a>
                @endauth
            @endif
        </div>
    </header>

    <!-- Main Container for Welcome Message -->
    <div class="container">
        <h2>Welcome to Laravel</h2>
        <p>Laravel is a powerful, elegant PHP framework for building modern web applications. Get started by logging in or creating a new account.</p>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} Laravel Application. All Rights Reserved.</p>
    </div>

</body>
</html>
