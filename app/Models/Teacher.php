<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'expertise',
        'contact_number',
    ];

    public function class()
    {
        return $this->belongsTo(Classname::class);
    }
}
