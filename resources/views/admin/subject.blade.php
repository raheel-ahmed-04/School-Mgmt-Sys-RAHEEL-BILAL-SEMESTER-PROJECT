<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management</title>
    <link href="{{ asset('school/css/adminsubject.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Subject Management System</h1>
            <nav>
                <a href="/">Home</a>
                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                <button class="add-subject-btn" onclick="openAddSubjectModal()">Add Subject</button>
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
        <div class="subject-list">
            <h2>Subject List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Credit Hours</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->credit_hours }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>
                                <button class="btn edit" onclick="openEditSubjectModal('{{ $subject->id }}', {{ json_encode($subject) }})">Edit</button>
                                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display: inline;">
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
            <h2 id="modalTitle" style="text-align: center;">Add Subject</h2>
            <form id="subjectForm" method="POST">
                @csrf <!-- CSRF token for Laravel -->
                <input type="hidden" id="_method" name="_method" value="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter subject name" required>
                </div>
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" id="code" name="code" placeholder="Enter subject code" required>
                </div>
                <div class="form-group">
                    <label for="credit_hours">Credit Hours:</label>
                    <input type="number" id="credit_hours" name="credit_hours" placeholder="Enter credit hours" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" placeholder="Enter description">
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('school/js/adminsubject.js') }}"></script>
</body>
</html>
