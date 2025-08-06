function exportStudentAverages() {
    // this create temp link to trigger download basically
    const link = document.createElement('a');
    link.href = '{{ route("report.export.student-averages") }}';
    link.download = 'student_averages.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function exportSubjectAverages() {
    // Create a temporary link element to trigger the download
    const link = document.createElement('a');
    link.href = '{{ route("report.export.subject-averages") }}';
    link.download = 'subject_averages.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function exportDetailedMarks() {
    const link = document.createElement('a');
    link.href = '{{ route("report.export.detailed-marks") }}';
    link.download = 'detailed_student_marks.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// trying dynamically calculate averages
function calculateAverages() {
    // testing typically feth from server
    console.log('Averages calculated and displayed in tables');
}

// initilia the page
document.addEventListener('DOMContentLoaded', function () {
    calculateAverages();
});