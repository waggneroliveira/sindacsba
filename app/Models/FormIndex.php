<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormIndex extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'gender',
        'description',
        'password',
    ];
}
