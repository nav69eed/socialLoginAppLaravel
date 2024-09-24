<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lites Notes - Register</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f2f2f2;
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
        .btn-register {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 5px;
        }
        .btn-register:hover {
            background-color: #0056b3;
        }
        .login-link {
            text-align: center;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="card-title">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-register btn-block">Register</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a class="login-link" href="{{ route('login') }}">Already registered? Login here</a>
    </div>
</body>
</html>
