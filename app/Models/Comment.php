<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use Notifiable, HasFactory;

    protected $fillable =[
        'comment',
        'active',
        'blog_id',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
