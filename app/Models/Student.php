<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'roll_number',
        'class_id',
        'date_of_birth',
        'parent_contact',
    ];

    public function class()
    {
        return $this->belongsTo(Classname::class, 'class_id');
    }
}
