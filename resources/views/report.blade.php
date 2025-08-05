<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Reports</title>
    @vite('resources/css/report.css')
</head>
<body>
    <!-- sidebar using svg -->
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
            <a href="{{url('/student')}}" class="nav-item ">
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
            <a href="{{url('/report')}}" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                </svg>
                <span class="nav-label">Reports</span>
            </a>
        </nav>
    </div>

    <!-- main content -->
    <div class="main-content">
        <div class="main-header">
            <h1>Reports</h1>
            <p>Student performance and subject analysis</p>
        </div>

        <div class="content">
            <!-- Student Average Marks Table -->
            <div class="table-section">
                <div class="table-header">
                    <div class="header-content">
                        <h3 class="table-title">Student Average Marks</h3>
                        <p class="table-subtitle">Average performance across all subjects</p>
                    </div>
                    <button class="csv-export-btn" onclick="exportStudentAverages()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                        Export CSV
                    </button>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Total Subjects</th>
                                <th>Average Mark</th>
                                <th>Average Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studentAverages as $student)
                                <tr>
                                    <td>{{ $student->student_code }}</td>
                                    <td>{{ $student->student_name }}</td>
                                    <td>{{ $student->total_subjects }}</td>
                                    <td class="average-mark">{{ number_format($student->average_mark, 1) }}</td>
                                    <td class="grade-{{ strtolower(str_replace(['+', '-'], '', $student->grade)) }}">
                                        {{ $student->grade }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No student data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- paginate the page 10 only -->
                <div class="pagination">
                     {{ $studentAverages->links('vendor.pagination.simple') }}
                </div>
            </div>

            <!-- Subject Average Marks Table -->
            <div class="table-section">
                <div class="table-header">
                    <div class="header-content">
                        <h3 class="table-title">Subject Average Marks</h3>
                        <p class="table-subtitle">Overall performance by subject across all students</p>
                    </div>
                    <button class="csv-export-btn" onclick="exportSubjectAverages()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                        Export CSV
                    </button>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Total Students</th>
                                <th>Highest Mark</th>
                                <th>Lowest Mark</th>
                                <th>Average Mark</th>
                                <th>Performance Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subjectAverages as $subject)
                                <tr>
                                    <td>{{ $subject->course_code }}</td>
                                    <td>{{ $subject->course_name }}</td>
                                    <td>{{ $subject->total_students }}</td>
                                    <td>{{ $subject->highest_mark }}</td>
                                    <td>{{ $subject->lowest_mark }}</td>
                                    <td class="average-mark">{{ number_format($subject->average_mark, 1) }}</td>
                                    <td class="grade-{{ strtolower(str_replace(' ', '-', $subject->performance_level)) }}">
                                        {{ $subject->performance_level }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No subject data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- paginate the page 10 only -->
                <div class="pagination">
                     {{ $subjectAverages->links('vendor.pagination.simple') }}
                </div>
            </div>

            <!-- Detailed Student Marks Table -->
            <div class="table-section">
                <div class="table-header">
                    <div class="header-content">
                        <h3 class="table-title">Detailed Student Marks</h3>
                        <p class="table-subtitle">Individual subject marks for each student</p>
                    </div>
                    <button class="csv-export-btn" onclick="exportDetailedMarks()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                        Export CSV
                    </button>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject</th>
                                <th>Mark</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studentMarks as $mark)
                                <tr>
                                    <td>{{ $mark->student_id }}</td>
                                    <td>{{ $mark->student_name }}</td>
                                    <td>{{ $mark->course_name }}</td>
                                    <td>{{ $mark->mark }}</td>
                                    <td class="grade-{{ strtolower($mark->grade) }}">{{ $mark->grade }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No detailed marks available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- paginate the page 10 only -->
                <div class="pagination">
                     {{ $studentMarks->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function exportStudentAverages() {
            // Placeholder function for CSV export
            alert('Student Average Marks CSV export functionality would be implemented here.');
            // In a real application, this would generate and download a CSV file
        }

        function exportSubjectAverages() {
            // Placeholder function for CSV export
            alert('Subject Average Marks CSV export functionality would be implemented here.');
            // In a real application, this would generate and download a CSV file
        }

        function exportDetailedMarks() {
            // Placeholder function for CSV export
            alert('Detailed Student Marks CSV export functionality would be implemented here.');
            // In a real application, this would generate and download a CSV file
        }

        // Calculate averages dynamically (for demonstration)
        function calculateAverages() {
            // This would typically fetch data from a database and calculate averages
            console.log('Averages calculated and displayed in tables');
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            calculateAverages();
        });
    </script>
</body>
</html>