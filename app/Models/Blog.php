<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Services\ActivityLogService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
        use Notifiable, HasFactory, LogsActivity;
    
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'date',
        'text',
        'path_image',
        'active',
        'sorting',
    ];

    public function categories(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeSorting($query){
        return $query->orderby('sorting', 'ASC');
    }

    public function getActivitylogOptions(): LogOptions
    {
        $activityLogService = new ActivityLogService($this);
        
        return LogOptions::defaults()
            ->logOnly($activityLogService->getLoggableAttributes());
    }
}
