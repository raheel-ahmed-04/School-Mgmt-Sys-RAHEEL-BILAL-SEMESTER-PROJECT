<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',              
        'email',             
        'subject_expertise', 
        'contact_number',   
    ];

    public function classes()
    {
        return $this->hasMany(Classroom::class);
    }
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
