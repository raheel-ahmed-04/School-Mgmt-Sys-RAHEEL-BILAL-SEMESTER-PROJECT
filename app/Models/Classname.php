<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    protected $fillable = [
        'name',
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
