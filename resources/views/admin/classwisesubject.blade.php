<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classwise Subject Management</title>
    <link href="{{ asset('school/css/adminclasswisesubject.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Classwise Subject Management</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
            <a href="#" class="add-student-btn" onclick="openAddSubjectModal()">Assign Subjects</a>
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
        <div class="subject-list">
            <h2>Classwise Subject Assignment</h2>
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Assigned Subjects</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classsubjects as $classsubject)
                        <tr>
                            <td>{{ optional($classsubject->classname)->name ?? 'N/A' }}</td>
                            <td>{{ optional($classsubject->subject)->name ?? 'N/A'}}</td>
                            <td>
                                <button class="btn edit" onclick="openEditSubjectsModal('{{ $classsubject->id }}', {{ json_encode($classsubject) }})">Edit</button>
                                <form action="{{ route('classwise.subject.destroy', $classsubject->id) }}" method="POST" style="display: inline;">
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

    <div class="modal" id="subjectModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="text-align: center;">Assign Subjects</h2>
            <form id="subjectForm" method="POST">
                @csrf
                <input type="hidden" id="_method" name="_method" value="POST">
                <div class="form-group">
                    <label for="class_id">Class:</label>
                    <select id="class_id" name="class_id" required>
                        <option value="" disabled selected>Select a Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="subjectDropdownContainer"></div>

                <div style="text-align: center;">
                    <button type="submit" class="btn primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const subjects = @json($subjects);
    </script>
    <script src="{{ asset('school/js/adminclasswise.js') }}"></script>

</body>
</html>
