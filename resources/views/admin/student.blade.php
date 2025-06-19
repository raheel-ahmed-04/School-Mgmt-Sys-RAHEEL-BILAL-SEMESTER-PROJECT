<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h2, h3 { color: #4CAF50; margin-bottom: 20px; }
        form { margin-bottom: 32px; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
        input, select {
             width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
        .edit-link, .delete-btn {
            border: none;
            padding: 6px 18px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin: 0 2px;
        }
        .edit-link {
            background: #1976d2;
            color: #fff;
        }
        .edit-link:hover {
            background: #125ea2;
        }
        .delete-btn {
            background: #e53935;
            color: #fff;
        }
        .delete-btn:hover {
            background: #b71c1c;
        }
        
        button{ background: linear-gradient(90deg, #FFC107, #4CAF50); color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.2s; text-decoration: none; display: inline-block; }
        button:hover { background: linear-gradient(90deg, #4CAF50, #FFC107); }

        table { width: 100%; border-collapse: collapse; margin-top: 24px; background: #fff; }
        th, td { padding: 12px 10px; border-bottom: 1px solid #eee; text-align: left; }
        th { background: #f1f1f1; color: #333; }
        tr:last-child td { border-bottom: none; }
        .actions form { display: inline; }
    </style>
</head>
<body>
<div class="container">
    <div style="margin-bottom: 24px;">
        <a href="{{ route('admin.dashboard') }}" style="background:#4CAF50;color:#fff;padding:10px 22px;border-radius:6px;text-decoration:none;font-weight:500;box-shadow:0 2px 8px rgba(76,175,80,0.08);transition:background 0.2s;">&larr; Back to Dashboard</a>
    </div>
    <h2>Student Management</h2>
    @if(session('success'))
    <div style="background:#e6ffed;color:#256029;padding:12px 20px;border-radius:6px;margin-bottom:20px;border:1px solid #b7ebc6;">
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('student.store') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <label for="roll_number">Roll Number</label>
        <input type="text" id="roll_number" name="roll_number" required>
        <label for="class_id">Class</label>
        <select id="class_id" name="class_id">
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>
        <label for="parent_contact">Parent Contact</label>
        <input type="text" id="parent_contact" name="parent_contact" required>
        <button type="submit">Add Student</button>
    </form>
    <h3>All Students</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll Number</th>
                <th>Class</th>
                <th>Date of Birth</th>
                <th>Parent Contact</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->roll_number }}</td>
                <td>{{ $student->class->name}}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->parent_contact }}</td>
                <td class="actions">
                    <form action="{{ route('student.edit') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <input type="submit" value="Edit" class="edit-link">
                    </form>
                </td>
                <td class="actions">
                    <form method="POST" action="{{ route('student.destroy') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
            @endforeach
            @if(count($students) == 0)
            <tr><td colspan="7" style="text-align:center;color:#aaa;">No students found.</td></tr>
            @endif
        </tbody>
    </table>
</div>
</body>
</html>
