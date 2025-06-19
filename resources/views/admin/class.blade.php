<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
            body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
            .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
            h2, h3 { color: #4CAF50; margin-bottom: 20px; }
            form { margin-bottom: 32px; }
            label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
            input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
            button, .edit-link, .delete-btn {
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
            .alert-success {
                background: #e6ffed;
                color: #256029;
                padding: 12px 20px;
                border-radius: 6px;
                margin-bottom: 20px;
                border: 1px solid #b7ebc6;
            }
            .alert-error {
                background: #ffeaea;
                color: #b71c1c;
                padding: 12px 20px;
                border-radius: 6px;
                margin-bottom: 20px;
                border: 1px solid #f5c2c7;
            }
            table { width: 100%; border-collapse: collapse; margin-top: 24px; background: #fff; }
            th, td { padding: 12px 10px; border-bottom: 1px solid #eee; text-align: left; }
            th { background: #f1f1f1; color: #333; }
            tr:last-child td { border-bottom: none; }
            .badge { display: inline-block; background: #FFC107; color: #333; border-radius: 12px; padding: 2px 10px; font-size: 13px; margin: 2px 2px 2px 0; }
            .actions form { display: inline; }
        </style>
</head>
<body>
<div class="container">
    <div style="margin-bottom: 24px;">
        <a href="{{ route('admin.dashboard') }}" style="background:#4CAF50;color:#fff;padding:10px 22px;border-radius:6px;text-decoration:none;font-weight:500;box-shadow:0 2px 8px rgba(76,175,80,0.08);transition:background 0.2s;">&larr; Back to Dashboard</a>
    </div>
    <h2>Class Management</h2>
    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
    @endif
    <form method="POST" action="{{ route('class.store') }}">
        @csrf
        <label for="name">Class Name</label>
        <input type="text" id="name" name="name" required>
        <label for="teacher_id">Assign Class Teacher</label>
        <select id="teacher_id" name="teacher_id">
            <option value="">-- None --</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        <button type="submit">Add Class</button>
    </form>


    <h3>All Classes</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Assigned Class Teacher</th>
                <th>Students</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td>{{ $class->teacher ? $class->teacher->name : 'None' }}</td>
                <td>
                    @if(count($class->students))
                        @foreach($class->students as $student)
                            <span class="badge">{{ $student->name }}</span>
                        @endforeach
                    @else
                        <span style="color:#aaa;">No students</span>
                    @endif
                </td>
                <td class="actions">
                    <form action="{{ route('class.edit') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $class->id }}">
                        <input type="submit" value="Edit" class="edit-link">
                    </form>
                </td>
                <td class="actions">
                    <form method="POST" action="{{ route('class.destroy') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $class->id }}">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
            @endforeach
            @if(count($classes) == 0)
            <tr><td colspan="6" style="text-align:center;color:#aaa;">No classes found.</td></tr>
            @endif
        </tbody>
    </table>
</div>
</body>
</html>
