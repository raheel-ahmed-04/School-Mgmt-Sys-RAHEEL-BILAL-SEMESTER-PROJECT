<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
