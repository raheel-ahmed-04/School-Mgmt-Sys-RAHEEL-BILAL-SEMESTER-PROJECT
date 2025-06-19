<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #4CAF50; margin-bottom: 20px; }
        form { margin-bottom: 0; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
        button, a.back-link { background: linear-gradient(90deg, #FFC107, #4CAF50); color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.2s; text-decoration: none; display: inline-block; }
        button:hover, a.back-link:hover { background: linear-gradient(90deg, #4CAF50, #FFC107); }
        .back-link { margin-bottom: 18px; }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('admin.class') }}" class="back-link">&larr; Back to Classes</a>
    <h2>Edit Class</h2>
    <form method="POST" action="{{ route('class.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $class->id }}">
        <label for="name">Class Name</label>
        <input type="text" id="name" name="name" value="{{ $class->name }}" required>
        <label for="teacher_id">Assigned Class Teacher</label>
        <select id="teacher_id" name="teacher_id">
            <option value="">-- None --</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" @if($class->teacher_id == $teacher->id) selected @endif>{{ $teacher->name }}</option>
            @endforeach
        </select>
        <button type="submit">Update Class</button>
    </form>
</div>
</body>
</html>
