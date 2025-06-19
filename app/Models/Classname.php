<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classname extends Model
{
    protected $fillable = [
        'name'
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
