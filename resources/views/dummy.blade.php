<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h1 class="mb-4">All Students</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Program</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Part</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->program }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->part }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
