<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
    <link href="{{ asset('school/css/adminclassname.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Class Management System</h1>
            <nav>
                <a href="/">Home</a>
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                <button class="add-class-btn" onclick="openAddClassModal()">Add Class</button>
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

        <div class="class-list">
            <h2>Class List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Assigned Teacher</th>
                        <th>List of Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                        
                            <td>{{ $class->name }}</td>
                            <td>{{ optional($class->teacher)->name ?? 'N/A' }}</td>
                            <td>
                                 @php
                                    $studentsFound = false; // Flag to check if students exist for the class
                                @endphp

                                @foreach($std as $student)
                                    @if($class->id === $student->class_id)
                                        @php
                                            $studentsFound = true; // Mark as found
                                        @endphp
                                        <span>{{ $student->name }} -- {{ $student->roll_number }}, </span><br>
                                    @endif
                                @endforeach

                                @if(!$studentsFound)
                                    <span>No students found for this class.</span>
                                @endif

                            </td>
                            
                            <td>
                                <button class="btn edit" onclick="openEditClassModal('{{ $class->id }}', {{ json_encode($class) }})">Edit</button>
                                <form action="{{ route('class.destroy', $class->id) }}" method="POST" style="display: inline;">
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

    <div class="modal" id="classModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Add Class</h2>
            <form id="classForm" method="POST">
                @csrf
                <input type="hidden" id="_method" name="_method" value="POST">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;">Class Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter class name" required>
                </div>
                <div class="form-group">
                    <label for="teacher_id" style="font-weight: bold;">Assigned Teacher:</label>
                    <select id="teacher_id" name="teacher_id" required>
                        <option value="" disabled selected>Select a teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn primary" type="submit">Save</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('school/js/adminclassname.js') }}"></script>
</body>
</html>
