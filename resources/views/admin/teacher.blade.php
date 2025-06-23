<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
            body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
            .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
            h2, h3 { color: #4CAF50; margin-bottom: 20px; }
            form { margin-bottom: 32px; }
            label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
            input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
            button, .edit-link, .delete-btn {
                background: linear-gradient(90deg, #FFC107, #4CAF50);
                border: none;
                color: white;
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
            .actions form { display: inline; }
            .back-dashboard {
                background: #4CAF50;
                color: #fff;
                padding: 10px 22px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: 500;
                box-shadow: 0 2px 8px rgba(76,175,80,0.08);
                transition: background 0.2s;
            }
        </style>
</head>
<body>
<div class="container">
    <div style="margin-bottom: 24px;">
        <a href="{{ route('admin.dashboard') }}" class="back-dashboard">&larr; Back to Dashboard</a>
    </div>
    <h2>Teacher Management</h2>
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
    <form method="POST" action="{{ route('teacher.store') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="expertise">Expertise</label>
        <input type="text" id="expertise" name="expertise" required>
        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" name="contact_number" required>
        <button type="submit">Add Teacher</button>
    </form>
    <h3>All Teachers</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Expertise</th>
                <th>Contact Number</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->subject_expertise }}</td>
                <td>{{ $teacher->contact_number }}</td>
                <td class="actions">
                    <form action="{{ route('teacher.edit') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <input type="submit" value="Edit" class="edit-link">
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('teacher.destroy') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <input type="submit" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
            @endforeach
            @if(count($teachers) == 0)
            <tr><td colspan="5" style="text-align:center;color:#aaa;">No teachers found.</td></tr>
            @endif
        </tbody>
    </table>
</div>
</body>
</html>
