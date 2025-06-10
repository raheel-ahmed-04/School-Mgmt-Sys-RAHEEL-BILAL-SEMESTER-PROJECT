<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_subject extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'subject_id'];

    public function classname()
    {
        return $this->belongsTo(Classname::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
