<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genitor extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = [
        'mother',
        'name',
        'surname',
        'image',
        'phone',
        'email',
    ];

    
}
