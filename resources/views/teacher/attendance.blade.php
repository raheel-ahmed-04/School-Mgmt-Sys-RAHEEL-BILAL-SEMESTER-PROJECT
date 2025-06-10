<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('school/css/teacherattendance.css') }}" rel="stylesheet">
</head>
<body>

    <header>
        <h1>Assigned Classes</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </nav>
    </header>
    @if (session('success'))
        <script>
            window.onload = function () {
                alert('{{ session('success') }}');
                // Refresh the page after the alert
                setTimeout(function() {
                    location.reload();
                }, 500); // 500ms delay to ensure alert is shown before refresh
            };
        </script>
    @endif

    <div class="container">
        <h2>Classes Assigned to You</h2>

        <div class="card-container">
            @foreach($classes as $class)
                <div class="card">
                    <div class="card-header">
                        {{ $class->name }}
                    </div>
                    <div class="card-body">
                        <span><strong>Teacher:</strong> {{ $class->teacher->name }}</span>
                        <button class="btn btn-info mt-3" data-toggle="modal" data-target="#studentModal{{ $class->id }}">
                            Mark Attendance
                        </button>
                        <button class="btn btn-info mt-3">
                            <a href="{{ route('attendance.history', $class->id) }}" style="color: white; text-decoration: none;">
                                Attendance History
                            </a>
                        </button>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    
    @foreach($classes as $class)
        <div class="modal fade" id="studentModal{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="studentModalLabel">Mark Attendance for {{ $class->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf

                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required class="form-control mb-3">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Present</th>
                                        <th>Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $students = $std->where('class_id', $class->id);
                                    @endphp

                                    @if($students->count() > 0)
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    <input type="radio" name="attendances[{{ $student->id }}][status]" value="1" required>
                                                </td>
                                                <td>
                                                    <input type="radio" name="attendances[{{ $student->id }}][status]" value="0" required>
                                                </td>
                                                <input type="hidden" name="attendances[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">No students found for this class.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-success">Submit Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
