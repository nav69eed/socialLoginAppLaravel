<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lites Notes - Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }

        .card {
            width: 100%;
            max-width: 600px;
            background: #fff;
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .user-name {
            font-size: 18px;
            margin: 0;
        }

        .navbar .container {
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: space-between;
        }


        .note-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .note-title-bar {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="container mx-auto">
            <h1 class="user-name">Welcome, {{ auth()->user()->name }}</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>

        </div>
    </div>

    <div class="note-container mt-5 py-3">
        <span class="my-4">
            <a href="/new" class="btn btn-success">Create a Note</a>
        </span>

        @forelse ($notes as $note)
            <div class="card">
                <div class="note-title-bar">
                    <span class=""> {{ $note->updated_at->diffForHumans() }} </span>
                    <div class="">
                        <a href="{{ route('shownote', $note->uuid) }}" class="btn btn-info">View Note</a>
                        <a href="{{ route('deletenote', $note->uuid) }}" class="btn btn-danger">Delete Note</a>
                    </div>
                </div>
                {{ $note->noteData }}
            </div>
        @empty
            <p>
                no notes to dispaly
            </p>
        @endforelse
    </div>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
