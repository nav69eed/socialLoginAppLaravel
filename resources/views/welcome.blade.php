<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lites Notes - Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f2f2f2;
        }

        .container {
            text-align: center;
            margin-top: 100px;
        }

        .welcome-text {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .btn-container {
            margin-top: 30px;
        }

        .btn {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="welcome-text">Welcome to Lites Notes</div>
        <div class="btn-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    <!-- Include Bootstrap JS if needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
