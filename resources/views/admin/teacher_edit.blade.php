<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f8f9fa; margin: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px; }
        h2 { color: #4CAF50; margin-bottom: 20px; }
        form { margin-bottom: 0; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 500; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 16px; font-size: 15px; }
        button, a.back-link { background: linear-gradient(90deg, #FFC107, #4CAF50); color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.2s; text-decoration: none; display: inline-block; }
        button:hover, a.back-link:hover { background: linear-gradient(90deg, #4CAF50, #FFC107); }
        .back-link { margin-bottom: 18px; }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('admin.teacher') }}" class="back-link">&larr; Back to Teachers</a>
    <h2>Edit Teacher</h2>
    <form method="POST" action="{{ route('teacher.update', $teacher->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $teacher->name }}" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $teacher->email }}" required>
        <label for="expertise">Expertise</label>
        <input type="text" id="expertise" name="expertise" value="{{ $teacher->subject_expertise }}" required>
        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" name="contact_number" value="{{ $teacher->contact_number }}" required>
        <button type="submit">Update Teacher</button>
    </form>
</div>
</body>
</html>
