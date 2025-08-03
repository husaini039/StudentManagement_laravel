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
        <div class="sidebar-header">
            <h1>Student Management System</h1>
        </div>
        <nav class="sidebar-nav">
            <a href="/dashboard" class="nav-item active">
                <span class="nav-item-title">Dashboard</span>
                <span class="nav-item-desc">Overview and statistics</span>
            </a>
            <a href="/student-info" class="nav-item">
                <span class="nav-item-title">Student Information</span>
                <span class="nav-item-desc">Manage student profiles</span>
            </a>
            <a href="/course-info" class="nav-item">
                <span class="nav-item-title">Course Information</span>
                <span class="nav-item-desc">Manage courses & curriculum</span>
            </a>
            <a href="/exam-marks" class="nav-item">
                <span class="nav-item-title">Exam Marks</span>
                <span class="nav-item-desc">Record & track grades</span>
            </a>
            <a href="/reports" class="nav-item">
                <span class="nav-item-title">Reports</span>
                <span class="nav-item-desc">Generate analytics</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Dashboard</h2>
        </div>
        
        <div class="content">
            <div class="welcome-section">
                <h3>Welcome to Student Management System</h3>
                <p>Monitor your educational institution's performance and manage all aspects of student administration from this central dashboard. Use the navigation menu to access different sections of the system.</p>
            </div>

            <div class="stats-section">
                <h4>Overview Statistics</h4>
                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-number">1,247</span>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">89</span>
                        <div class="stat-label">Active Courses</div>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">156</span>
                        <div class="stat-label">Exams Conducted</div>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">24</span>
                        <div class="stat-label">Reports Generated</div>
                    </div>
                </div>
            </div>

            <div class="recent-activity">
                <h4>Recent Activity</h4>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-time">2 hours ago</div>
                        <div class="activity-desc">New student John Smith enrolled in Computer Science program</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-time">5 hours ago</div>
                        <div class="activity-desc">Exam results published for Mathematics 101</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-time">1 day ago</div>
                        <div class="activity-desc">New course "Database Management" added to curriculum</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-time">2 days ago</div>
                        <div class="activity-desc">Monthly attendance report generated</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>