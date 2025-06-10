<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'credit_hours',
        'description',
    ];
    public function class_subject()
    {
        return $this->hasMany(Class_subject::class, 'subject_id');
    }
}
