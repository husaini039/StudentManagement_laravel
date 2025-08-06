# Student Management System

This is a simple Laravel-based Student Management System developed to manage students, courses, and exam marks.
The system also includes a reporting module to generate insights based on student performance.

## 📚 Features

### 1. Core Modules
- **Students**: Manage student records including name, ID, contact details, date of birth, and academic info.
- **Courses**: Manage course details for subjects offered.
- **Exam Marks**: Record and manage students' marks for each subject.
- **Reports**: Generate analytical reports based on stored data.

### 2. CRUD Operations
Each of the following modules includes full **Create**, **Read**, **Update**, and **Delete** (CRUD) functionality:
- Student Module
- Course Module
- Exam Marks Module

### 3. Reports Module
The reporting module offers the following functionalities:
- 📊 **Average mark per student**: Automatically calculates and displays the average score for each student across all their subjects.
- 📘 **Average mark per subject**: Calculates the overall average mark for each subject across all students.
- 📥 **Export to CSV**: Both reports can be exported in CSV format for offline access or further analysis.

## Technologies Used
- Laravel (PHP Framework)
- Blade Templates
- MySQL
- HTML/CSS (custom styling)

## 🛠 Setup Instructions
1. Clone this repository
2. Run `composer install`
3. Set up your `.env` file and configure the database
4. Run migrations: `php artisan migrate`
5. Start the server: `php artisan serve`

---
Feel free to modify or add project screenshots, setup steps, or contributor info if you plan to expand the repository.

> Dashboard
<img src="https://github.com/user-attachments/assets/370b122f-8154-4ebb-b01b-0aa4dda49b7f" width="800" alt="Dashboard Screenshot">
> Student List
<img src="https://github.com/user-attachments/assets/106a3e32-0511-4539-9bae-9cf16f1cc4ad" width="800" alt="Student List Screenshot">
> Add Student Form
<img src="https://github.com/user-attachments/assets/9c8292ba-459a-49f4-ab1c-3aedb238ca28" width="800" alt="Add Student Screenshot">
> Reports Module
<img src="https://github.com/user-attachments/assets/31586b7c-bb60-4299-abbc-37f059777373" width="800" alt="Reports Screenshot">
