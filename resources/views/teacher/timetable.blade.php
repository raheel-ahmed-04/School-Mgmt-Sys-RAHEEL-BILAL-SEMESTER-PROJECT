<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Timetable</title>
    <link href="{{ asset('school/css/teachertimetable.css') }}" rel="stylesheet">
</head>
<body>

    <header>
        <h1>All Techer Timetable</h1>
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
        
        <div class="card-container">
            @foreach($slots as $slot)
                <div class="card @if($timetables->contains('slot_id', $slot->id)) highlight @endif">
                    <div class="card-header">
                        {{ $slot->day }} - {{ $slot->time_slot }}
                    </div>
                    <div class="card-body">
                        @php
                            $hasContent = false;
                        @endphp

                        @foreach($timetables as $timetable)
                            @if($timetable->slot_id == $slot->id)
                                <span>
                                    <strong>Class:</strong> 
                                    <span style="color: red; font-weight: bold;">
                                        {{ $timetable->classSubject->classname->name }}
                                    </span>
                                </span>
                                <span>
                                    <strong>Subject:</strong> 
                                    <span style="color: red; font-weight: bold;">
                                        {{ $timetable->classSubject->subject->name }}
                                    </span>
                                </span>
                                <span>
                                    <strong>Teacher:</strong> 
                                    {{ $timetable->teacher->name }}
                                </span>
                                <span class="room">
                                    <strong>Room:</strong> 
                                    {{ $timetable->room_number }}
                                </span>
                                @php
                                    $hasContent = true;
                                @endphp
                            @endif
                        @endforeach

                        @if(!$hasContent)
                            <span class="no-lecture">No Lecture</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
