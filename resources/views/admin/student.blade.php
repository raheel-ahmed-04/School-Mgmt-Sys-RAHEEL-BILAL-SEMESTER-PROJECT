<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="{{ asset('school/css/adminstudent.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Student Management System</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            <a href="#" class="add-student-btn" onclick="openAddStudentModal()">Add Student</a>
            <a href="#" class="logout-btn">Logout</a>
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
            <h2>Student List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Class</th>
                        <th>Date of Birth</th>
                        <th>Parent Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->roll_number }}</td>
                            <td>{{ optional($student->class)->name ?? 'N/A'}} </td>
                            <td>{{ $student->date_of_birth }}</td>
                            <td>{{ $student->parent_contact }}</td>
                            <td>
                                <button class="btn edit" onclick="openEditStudentModal('{{ $student->id }}', {{ json_encode($student) }})">Edit</button>
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display: inline;">
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

    <!-- Modal -->
    <div class="modal" id="studentModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="text-align: center;">Add Student</h2>
            <form id="studentForm" method="POST">
                @csrf
                <input type="hidden" id="_method" name="_method" value="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="roll">Roll Number:</label>
                    <input type="text" id="roll" name="roll" required>
                </div>
                <div class="form-group">
                    <label for="class_id">Class:</label>
                    <select id="class_id" name="class_id" required>
                        <option value="" disabled selected>Select a Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="parentContact">Parent Contact:</label>
                    <input type="text" id="parentContact" name="parentContact" required>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('school/js/adminstudent.js') }}"></script>
</body>
</html>
