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
    <!-- Sidebar -->
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="main-header">
            <h1>Dashboard</h1>
            <p>Overview</p>
        </div>
        
        <div class="content">
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h2v-7.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V18h2v-4h3v4h2V9.5c0-1.11-.89-2-2-2h-3.5c-.83 0-1.5.67-1.5 1.5v1h-3v-1c0-.83-.67-1.5-1.5-1.5H4c-1.11 0-2 .89-2 2V18h2z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Students</div>
                    <div class="stat-number">1,247</div>
                    <div class="stat-label">↗ Active</div>
                </div>
                
                <div class="stat-card secondary">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Courses</div>
                    <div class="stat-number">89</div>
                    <div class="stat-label">↗ Running</div>
                </div>
                
                <div class="stat-card tertiary">
                    <div class="stat-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stat-title">Exams</div>
                    <div class="stat-number">156</div>
                    <div class="stat-label">↗ Completed</div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-section">
                <div class="table-header">
                    <h3 class="table-title">Recent Activities</h3>
                    <div class="table-tabs">
                        <button class="table-tab active">Top Students</button>
                        <button class="table-tab">Recent Enrollments</button>
                        <button class="table-tab">Exam Results</button>
                    </div>
                </div>
                
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>STU001</td>
                            <td>Ahmad bin Abdullah</td>
                            <td>Computer Science</td>
                            <td>A</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU002</td>
                            <td>Siti Nurhaliza</td>
                            <td>Information Technology</td>
                            <td>A-</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU003</td>
                            <td>Muhammad Ali</td>
                            <td>Software Engineering</td>
                            <td>B+</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU004</td>
                            <td>Fatimah binti Hassan</td>
                            <td>Data Science</td>
                            <td>A</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU005</td>
                            <td>Omar bin Yusuf</td>
                            <td>Cybersecurity</td>
                            <td>B</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU006</td>
                            <td>Aishah binti Rahman</td>
                            <td>Web Development</td>
                            <td>A-</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU007</td>
                            <td>Hassan bin Ibrahim</td>
                            <td>Mobile Development</td>
                            <td>B+</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>STU008</td>
                            <td>Zainab binti Ahmad</td>
                            <td>Database Management</td>
                            <td>A</td>
                            <td>Active</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <span>1-8 of 1,247 items</span>
                    <span>Items per page: 10</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>