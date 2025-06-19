<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #4CAF50; margin-bottom: 20px; }
        form { margin-bottom: 0; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
        button { background: linear-gradient(90deg, #FFC107, #4CAF50); color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.2s; }
        button:hover { background: linear-gradient(90deg, #4CAF50, #FFC107); }
        a { color: #1976d2; text-decoration: none; font-size: 15px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Student</h2>
    <form method="POST" action="{{ route('student.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $student->id }}">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $student->name }}" required>
        <label for="roll_number">Roll Number</label>
        <input type="text" id="roll_number" name="roll_number" value="{{ $student->roll_number }}" required>
        <label for="class_id">Class</label>
        <select id="class_id" name="class_id">
            @foreach($classes as $class)
                <option value="{{ $class->id }}" @if($student->class_id == $class->id) selected @endif>{{ $class->name }}</option>
            @endforeach
        </select>
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $student->date_of_birth }}" required>
        <label for="parent_contact">Parent Contact</label>
        <input type="text" id="parent_contact" name="parent_contact" value="{{ $student->parent_contact }}" required>
        <button type="submit">Update Student</button>
        <a href="{{ route('admin.student') }}" style="margin-left:18px;">Cancel</a>
    </form>
</div>
</body>
</html>
