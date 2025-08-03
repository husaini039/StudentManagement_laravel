<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <h1>Welcome to the Student Management System</h1>
    </header>

    <a href="{{ url('/dummy') }}">Go to Test</a>

    <form action="{{ route('formsubmit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your name" required>
        <button type="submit">Submit</button>
    </form>

</body>
</html>