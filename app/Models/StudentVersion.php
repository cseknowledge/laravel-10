<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentVersion extends Model
{
    use HasFactory;
    protected $table = 'students_version';
    protected $fillable = [
        'current_name',
        'previous_name',
    ];
}
