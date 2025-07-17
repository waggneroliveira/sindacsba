<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Services\ActivityLogService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use Notifiable, HasFactory, LogsActivity;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'path_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static $recordEvents = ['created', 'deleted']; //OBS: Com isso eu evito que, ao deslogar, o activity log registre o evento de update quando eu deslogar

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $activityLogService = new ActivityLogService($this);
        
        return LogOptions::defaults()
            ->logOnly($activityLogService->getLoggableAttributes());
    }

}
