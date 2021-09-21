<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'breakfast',
        'water',
        'vegatables',
        'protein',
        'carbohydrate',
        'day',
        'month',
        'year',
    ];
}
