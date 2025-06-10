<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('school/css/teacherassignclass.css') }}" rel="stylesheet">
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
                            Show Students
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    @foreach($classes as $class)
        <div class="modal fade" id="studentModal{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentModalLabel">Students for {{ $class->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $students = $std->where('class_id', $class->id);
                            $studentCount = $students->count();
                        @endphp

                        @if($studentCount > 0)
                            @foreach($students as $student)
                                <span>{{ $student->name }} -- {{ $student->roll_number }}</span><br>
                            @endforeach
                            <p><strong>Student Strength:</strong> {{ $studentCount }}</p>
                        @else
                            <span>No students found for this class.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
