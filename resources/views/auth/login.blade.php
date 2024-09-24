<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lites Notes - Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #2f3844;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            width: 400px;
            background: #fff;
            border-radius: 10px;
            padding: 40px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-login {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 5px;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .remember-me {
            display: flex;
            justify-content: space-between;
        }
        .forgot-password {
            text-align: center;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="card-title">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group remember-me">
                <label for="remember" class="form-check-label">
                    <input type="checkbox" id="remember" name="remember">
                    Remember Me
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-login btn-block">Login</button>
            </div>
        </form>
        <a class="forgot-password" href="{{ route('password.request') }}">Forgot Your Password?</a>
    </div>
</body>
</html>
