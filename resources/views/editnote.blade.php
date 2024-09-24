<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note - Lites Notes</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
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
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Create a New Note</h2>
            <form method="POST" action="{{ route('editnotepost',$note->uuid) }}">
                @csrf
                <div class="form-group">
                    <label for="noteData">Note Content</label>
                    <textarea id="noteData" class="form-control" name="noteData" rows="4" required>
                        {{ $note->noteData }}
                    </textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">Update Note</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
