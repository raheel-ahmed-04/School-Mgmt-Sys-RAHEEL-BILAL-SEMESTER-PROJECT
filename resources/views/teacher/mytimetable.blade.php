<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $teacher->name }}'s Timetable</title>
    <link href="{{ asset('school/css/teachermytimetable.css') }}" rel="stylesheet">
</head>
<body>

    <header>
        <h1>{{ $teacher->name }}'s Timetable</h1>
        <nav>
            <a href="/">Home</a>
            <a href="{{ url('/teacher/dashboard') }}">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </nav>
    </header>

    <div class="container">
        <h2>Timetable</h2>

        <table class="timetable">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slots as $slot)
                    <tr>
                        <td>{{ $slot->day }}</td>
                        <td>{{ $slot->time_slot }}</td>
                        @php
                            $timetableItem = $timetables->where('slot_id', $slot->id)->first();
                        @endphp

                        @if($timetableItem)
                            <td>{{ $timetableItem->classSubject->classname->name }}</td>
                            <td>{{ $timetableItem->classSubject->subject->name }}</td>
                            <td>{{ $timetableItem->room_number }}</td>
                        @else
                            <td colspan="3" class="no-lecture">No Lecture</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
