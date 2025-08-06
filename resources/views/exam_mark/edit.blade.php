<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Marks - Student Management System</title>
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
            <h1>Edit Student Marks</h1>
            <p>Update student marks information</p>
        </div>

        <div class="content">
            <div class="form-section">
                <div class="form-header">
                    <h3 class="form-title">Edit Student Marks</h3>
                    <p class="form-subtitle">Update the student's marks below</p>
                </div>

                <form method="POST" action="{{ route('exam_mark.update', $examMark->id) }}" class="edit-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text" name="student_id" value="{{ $examMark->student_id }}" required>
                            @error('student_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="course_id">Course ID</label>
                            <input type="text" name="course_id" value="{{ $examMark->course_id }}" required>
                            @error('course_id')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="mark">Marks</label>
                            <input type="number" name="mark" id="mark" value="{{ $examMark->mark }}" min="0" max="100" required>
                            @error('mark')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" name="grade" id="grade" value="{{ $examMark->grade }}" readonly>
                            @error('grade')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                           
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('exam_mark.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Marks</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-calculate grade based on mark
        document.getElementById('mark').addEventListener('input', function() {
            const mark = parseInt(this.value);
            const gradeField = document.getElementById('grade');
            
            if (mark >= 0 && mark <= 100) {
                let grade;
                if (mark >= 90) {
                    grade = 'A+';
                } else if (mark >= 80) {
                    grade = 'A';
                } else if (mark >= 70) {
                    grade = 'B';
                } else if (mark >= 60) {
                    grade = 'C';
                } else if (mark >= 50) {
                    grade = 'D';
                } else {
                    grade = 'F';
                }
                gradeField.value = grade;
            } else {
                gradeField.value = '';
            }
        });

        // Initialize grade on page load
        document.addEventListener('DOMContentLoaded', function() {
            const markField = document.getElementById('mark');
            const gradeField = document.getElementById('grade');
            
            if (markField.value) {
                const mark = parseInt(markField.value);
                if (mark >= 0 && mark <= 100) {
                    let grade;
                    if (mark >= 90) {
                        grade = 'A+';
                    } else if (mark >= 80) {
                        grade = 'A';
                    } else if (mark >= 70) {
                        grade = 'B';
                    } else if (mark >= 60) {
                        grade = 'C';
                    } else if (mark >= 50) {
                        grade = 'D';
                    } else {
                        grade = 'F';
                    }
                    gradeField.value = grade;
                }
            }
        });
    </script>
</body>
</html> 