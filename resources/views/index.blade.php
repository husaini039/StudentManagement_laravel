<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <!-- the sidebar -->
    <div class="sidebar">
        <div class="user-profile">
            <div class="user-avatar">A</div>
            <span>Admin</span>
        </div>
        <nav class="sidebar-nav">
            <a href="{{url('/index')}}" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span class="nav-label">Dashboard</span>
            </a>
            <a href="{{url('/student')}}" class="nav-item">
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
            <a href="{{url('/report')}}" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                </svg>
                <span class="nav-label">Reports</span>
            </a>

        </nav>
    </div>

    <!-- main content goes here -->
    <div class="main-content">
        <div class="main-header">
            <h1>Dashboard</h1>
            <p>Overview</p>
        </div>
        
        <div class="content">
            <!-- this is where the 6 card of stats (stats card) -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h2v-7.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V18h2v-4h3v4h2V9.5c0-1.11-.89-2-2-2h-3.5c-.83 0-1.5.67-1.5 1.5v1h-3v-1c0-.83-.67-1.5-1.5-1.5H4c-1.11 0-2 .89-2 2V18h2z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Students</div>
                    <div class="stat-number">{{ number_format($totalStudents) }}</div>
                    <div class="stat-label">↗ Active</div>
                </div>
                
                <div class="stat-card secondary">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Courses</div>
                    <div class="stat-number">{{ number_format($totalCourses) }}</div>
                    <div class="stat-label">↗ Running</div>
                </div>
                
                <div class="stat-card tertiary">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Exams</div>
                    <div class="stat-number">{{ number_format($totalExams) }}</div>
                    <div class="stat-label">↗ Completed</div>
                </div>
            </div>

            <!-- the performance statistics -->
            @if($totalExams > 0)
            <div class="stats-grid" style="margin-top: 20px;">
                <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Average Mark</div>
                    <div class="stat-number">{{ number_format($averageMark, 1) }}</div>
                    <div class="stat-label">Overall Performance</div>
                </div>
                
                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Highest Mark</div>
                    <div class="stat-number">{{ $highestMark }}</div>
                    <div class="stat-label">Best Performance</div>
                </div>
                
                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Lowest Mark</div>
                    <div class="stat-number">{{ $lowestMark }}</div>
                    <div class="stat-label">Needs Improvement</div>
                </div>
            </div>
            @endif

            <!-- table section goes here -->
            <div class="table-section">
                <div class="table-header">
                    <h3 class="table-title">Recent Activities</h3>
                    <div class="table-tabs">
                         <!-- 3 tab responsible (changing using js) -->
                        <button class="table-tab active">Top Students</button>
                        <button class="table-tab">Recent Enrollments</button>
                        <button class="table-tab">Exam Results</button>
                    </div>
                </div>
                
                <table class="data-table">
                    <thead id="table-headers">
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Grade</th>
                            <th>Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topStudents as $student)
                            <tr>
                                <td>{{ $student->student_code }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->course_name }}</td>
                                <td class="grade-{{ strtolower($student->grade) }}">{{ $student->grade }}</td>
                                <td class="average-mark">{{ $student->mark }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No exam results available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <script>
        // the tab function 
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.table-tab');
            const tableBody = document.querySelector('.data-table tbody');
            
            // the default view will always top students
            const topStudentsData = @json($topStudents);
            
            // the recent enroll stats
            const recentEnrollmentsData = @json($recentEnrollments);
            
            // exam result stats
            const recentExamResultsData = @json($recentExamResults);
            
            function updateTable(data, columns, headers) {
                // Update table headers
                const headerRow = document.querySelector('#table-headers tr');
                headerRow.innerHTML = '';
                headers.forEach(header => {
                    const th = document.createElement('th');
                    th.textContent = header;
                    headerRow.appendChild(th);
                });
                
                // Update table body
                tableBody.innerHTML = '';
                
                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="5" class="text-center">No data available</td></tr>';
                    return;
                }
                
                data.forEach(item => {
                    const row = document.createElement('tr');
                    columns.forEach(column => {
                        const cell = document.createElement('td');
                        if (column === 'grade' && item[column]) {
                            cell.className = `grade-${item[column].toLowerCase()}`;
                        }
                        if (column === 'mark' || column === 'average_mark') {
                            cell.className = 'average-mark';
                        }
                        cell.textContent = item[column] || '';
                        row.appendChild(cell);
                    });
                    tableBody.appendChild(row);
                });
            }
            
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // when selected the table updated
                    switch(index) {
                        case 0: // for top students
                            updateTable(topStudentsData, ['student_code', 'student_name', 'course_name', 'grade', 'mark'], 
                                     ['Student ID', 'Student Name', 'Course', 'Grade', 'Mark']);
                            break;
                        case 1: // the recent ewnrollemn 
                             updateTable(recentEnrollmentsData, ['student_id', 'name', 'program', 'part', 'id'], 
                                      ['Student ID', 'Name', 'Program', 'Part', 'ID']);
                             break;
                        case 2: // recent exam result (basically desc order)
                            updateTable(recentExamResultsData, ['student_code', 'student_name', 'course_name', 'grade', 'mark'], 
                                     ['Student ID', 'Student Name', 'Course', 'Grade', 'Mark']);
                            break;
                    }
                });
            });
        });
    </script>
</body>
</html>