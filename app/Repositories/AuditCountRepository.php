<?php
namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;

class AuditCountRepository
{
    public function allAudit(){
        $today = today();
        $auditorias = Activity::with('causer')
            ->whereDate('created_at', '=', $today)
            ->where('is_read', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $auditorias;
    }
    public function auditCount(){
        $today = today();
        $auditorias = Activity::with('causer')
            ->whereDate('created_at', '=', $today)
            ->where('is_read', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        
        $auditCount = $auditorias->count();

        return $auditCount;
    }
}