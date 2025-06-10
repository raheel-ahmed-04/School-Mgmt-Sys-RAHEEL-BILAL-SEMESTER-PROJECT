<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',           
        'class_id',
        'roll_number',    
        'date_of_birth',  
        'parent_contact', 
    ];

    public function class()
    {
        return $this->belongsTo(Classname::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
