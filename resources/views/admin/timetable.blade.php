<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable Management</title>
    <link href="{{ asset('school/css/adminstudent.css') }}" rel="stylesheet">
</head>
<body>
   
    <header>
        <h1>Timetable Management System</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            <a href="#" class="add-student-btn" onclick="openAddTimetableModal()">Add Timetable</a>
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
            };
        </script>
    @endif
    @if ($errors->any())
        <div style="color: red; font-weight: bold;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <div class="container">
        <div class="student-list">
            <h2>Timetable</h2>
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Slot</th>
                        <th>Room</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timetables as $timetable)
                        <tr>
                            <td>{{ optional($timetable->classSubject->classname)->name ?? 'N/A'}}</td>
                            <td>{{ optional($timetable->classSubject->subject)->name ?? 'N/A'}}</td>
                            <td>{{ optional($timetable->teacher)->name ?? 'N/A'}}</td>
                            <td>{{ optional($timetable->slot)->day ?? 'N/A' }} -- {{ optional($timetable->slot)->time_slot ?? 'N/A' }}</td>
                            <td>{{ $timetable->room_number }}</td>
                            <td>
                                <button class="btn edit" onclick="openEditTimetableModal('{{ $timetable->id }}', {{ json_encode($timetable) }})">Edit</button>
                                <form action="{{ route('timetable.destroy', $timetable->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="timetableModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="text-align: center;">Add Timetable</h2>
            <form id="timetableForm" method="POST">
                @csrf
                <input type="hidden" id="_method" name="_method" value="POST">
                <div class="form-group">
                    <label for="class_subject_id">Class and Subject:</label>
                    <select id="class_subject_id" name="class_subject_id" required>
                        <option value="" disabled selected>Select a Class and Subject</option>
                        @foreach($classSubjects as $classSubject)
                            <option value="{{ $classSubject->id }}">{{ $classSubject->classname->name }} - {{ $classSubject->subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="teacher_id">Teacher:</label>
                    <select id="teacher_id" name="teacher_id" required>
                        <option value="" disabled selected>Select a Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slot_id">Slot:</label>
                    <select id="slot_id" name="slot_id" required>
                        <option value="" disabled selected>Select a Slot</option>
                        @foreach($slots as $slot)
                            <option value="{{ $slot->id }}">{{ $slot->day }}--{{ $slot->time_slot }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="room_number">Room Number:</label>
                    <input type="text" id="room_number" name="room_number">
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn primary">Save</button>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('school/js/admintimetable.js') }}"></script>
    
</body>
</html>
