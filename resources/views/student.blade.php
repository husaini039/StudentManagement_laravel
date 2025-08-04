<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Student</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Sidebar -->
   <div class="sidebar">
        <div class="user-profile">
            <div class="user-avatar">A</div>
            <span>Admin</span>
        </div>
        <nav class="sidebar-nav">
            <a href="{{url('/index')}}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span class="nav-label">Dashboard</span>
            </a>
            <a href="{{url('/student')}}" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <span class="nav-label">Students</span>
            </a>
            <a href="{{url('/course')}}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                    <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
                <span class="nav-label">Courses</span>
            </a>
            <a href="{{url('/exam_mark')}}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                <span class="nav-label">Exam Marks</span>
            </a>
            <a href="/reports" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                </svg>
                <span class="nav-label">Reports</span>
            </a>

        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="main-header">
            <h1>Student List</h1>
            <p>Overview</p>
        </div>
        
        <div class="content">
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

          
        </div>
    </div>
</body>
</html>