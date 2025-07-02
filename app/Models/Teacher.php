<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject_expertise', 
        'contact_number',
    ];

    public function class()
    {
        return $this->hasOne(Classname::class, 'teacher_id');
    }
}
