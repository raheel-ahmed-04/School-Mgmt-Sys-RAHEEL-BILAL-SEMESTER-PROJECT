<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    <link href="{{ asset('school/css/adminteacher.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Teacher Management System</h1>
            <nav>
                <a href="/">Home</a>
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                <button class="add-teacher-btn" onclick="openAddTeacherModal()">Add Teacher</button>
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
        <div class="teacher-list">
            <h2>Teacher List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject Expertise</th>
                        <th>Contact No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->subject_expertise }}</td>
                            <td>{{ $teacher->contact_number }}</td>
                            <td>
                                <button class="btn edit" onclick="openEditTeacherModal('{{ $teacher->id }}', {{ json_encode($teacher) }})">Edit</button>
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display: inline;">
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

    <div class="modal" id="teacherModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="text-align: center;">Add Teacher</h2>
            <form id="teacherForm" method="POST">
                @csrf 
                <input type="hidden" id="_method" name="_method" value="POST"> 
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter teacher name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="subject_expertise">Subject Expertise:</label>
                    <input type="text" id="subject_expertise" name="subject_expertise" placeholder="Enter subject expertise" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="tel" id="contact_number" name="contact_number" placeholder="Enter contact number" required>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('school/js/adminteacher.js') }}"></script>
</body>
</html>
