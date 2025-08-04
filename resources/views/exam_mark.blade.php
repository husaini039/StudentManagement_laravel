<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Exam Marks</title>
    @vite('resources/css/student.css')

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
            <a href="{{url('/exam_mark')}}" class="nav-item active">
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

    <!-- main content -->
    <div class="main-content">
        <div class="main-header">
            <h1>Exam Marks List</h1>
            <p>Overview</p>
        </div>

        <div class="content">
            <div class="table-section">
                <div class="table-header">
                    <h3 class="table-title">Exam Marks Records</h3>
                    <p class="table-subtitle">Manage and view all registered exam marks</p>   
                      <!-- the search content -->     
                        <div class="search-container"> 
                         <form method="GET" action="{{ route('exam_mark.index') }}" class="search-form">
                             <div class="search-box">
                                 <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
                                     <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                 </svg>
                                 <input 
                                     type="text" 
                                     name="search"
                                     class="search-input" 
                                     placeholder="Search exam marks by student ID, course ID, or grade..."
                                     value="{{ request('search') }}"
                                 >
                             </div>
                             <button type="submit" class="search-btn">Search</button>
                             @if(request('search'))
                                 <a href="{{ route('exam_mark.index') }}" class="clear-search">Clear</a>
                             @endif
                         </form>
                         <a href="{{ route('exam_mark.add') }}" class="search-btn">Add</a>

                     </div>
                </div>

                  <!-- mtable stuff-->
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Course ID</th>
                                <th>Mark</th>
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examMarks as $examMark)
                            <tr>
                                <td>{{ $examMark->id }}</td>
                                <td>{{ $examMark->student_id }}</td>
                                <td>{{ $examMark->course_id }}</td>
                                <td>{{ $examMark->mark }}</td>
                                <td>{{ $examMark->grade }}</td>
                                <td>
                                    <div class="action-buttons">
                                             <a href="{{ route('exam_mark.edit', $examMark->id) }}" class="btn btn-edit">
                                                 <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor">
                                                     <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                                 </svg>
                                                 Edit
                                             </a>
                                             <form method="POST" action="{{ route('exam_mark.delete', $examMark->id) }}" style="display: inline;" onsubmit="return confirm('Removing an exam mark, are you sure?')">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-delete">
                                                     <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor">
                                                         <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                     </svg>
                                                     Delete
                                                 </button>
                                             </form>
                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- paginate the page 10 only -->
                <div class="pagination">
                     {{ $examMarks->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>