<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Management System</title>
    @vite('resources/css/student.css')
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
            <h1>Add a Student</h1>
            <p>Add student information</p>
        </div>

        <div class="content">
            <div class="form-section">
                <div class="form-header">
                    <h3 class="form-title">Add Student Information</h3>
                    <p class="form-subtitle">Add student's details below</p>
                </div>

                <form method="POST" action="{{ route('students.store') }}" class="edit-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text"  name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text"  name="student_id" value="{{ old('student_id') }}" required>
                            @error('student_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text"  name="phone_number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date"  name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            @error('date_of_birth')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text"  name="program" value="{{ old('program') }}" required>
                            @error('program')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="part">Part (1-6)</label>
                            <input type="number"  name="part" min="1" max="6" value="{{ old('part') }}" required>
                            @error('part')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html> 