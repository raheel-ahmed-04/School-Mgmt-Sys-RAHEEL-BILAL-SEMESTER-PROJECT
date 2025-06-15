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

    public function classes()
    {
        return $this->hasMany(Classname::class);
    }
}
