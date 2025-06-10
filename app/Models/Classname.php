<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'teacher_id'];

    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function class_subject()
    {
        return $this->hasMany(Class_subject::class, 'class_id');
    }
}
