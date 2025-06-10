<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('school/css/teacherattendancehistory.css') }}" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav>
    <a href="/">Home</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</nav>

<!-- Attendance Chart and Table -->
<div class="container">
    <h2>Attendance History for {{ $attendances->first()->student->class->name ?? 'Class' }}</h2>

    <div class="chart-container">
        <canvas id="attendanceChart"></canvas>
    </div>

    <div class="mt-5">
        <h4>Detailed History</h4>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Student</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->student->name }}</td>
                        <td>{{ $attendance->status ? 'Present' : 'Absent' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No attendance records found for this month.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const attendanceData = @json($attendances);

        const dates = [...new Set(attendanceData.map(item => item.date))];
        const students = [...new Set(attendanceData.map(item => item.student.name))];

        const presentData = students.map(student => {
            const studentAttendance = attendanceData.filter(item => item.student.name === student);
            return dates.map(date => {
                const attendance = studentAttendance.find(item => item.date === date);
                return attendance && attendance.status ? 1 : 0; // 1 for present, 0 for absent
            });
        });

        const absentData = students.map(student => {
            const studentAttendance = attendanceData.filter(item => item.student.name === student);
            return dates.map(date => {
                const attendance = studentAttendance.find(item => item.date === date);
                return attendance && !attendance.status ? 1 : 0; // 1 for absent, 0 for present
            });
        });

        const ctx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: students,
                datasets: [{
                    label: 'Present',
                    data: presentData.map(studentData => studentData.reduce((a, b) => a + b, 0)), // Count of presents
                    backgroundColor: '#388e3c',
                    borderColor: '#fff',
                    borderWidth: 1
                }, {
                    label: 'Absent',
                    data: absentData.map(studentData => studentData.reduce((a, b) => a + b, 0)), // Count of absents
                    backgroundColor: '#FF6347',
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return tooltipItem.raw + ' days';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

</body>
</html>
