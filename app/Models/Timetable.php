<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = ['class_subject_id', 'teacher_id', 'slot_id', 'room_number'];

    public function classSubject()
    {
        return $this->belongsTo(Class_subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
