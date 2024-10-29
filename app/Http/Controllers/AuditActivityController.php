<?php

namespace App\Http\Controllers;

use App\Models\SettingTheme;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\AuditCountRepository;
use App\Repositories\SettingThemeRepository;

class AuditActivityController extends Controller
{
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        $notifications = (new AuditCountRepository());
        $auditorias = $notifications->allAudit();
        $auditCount = $notifications->auditCount();

        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('auditoria.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }

        $activities = Activity::with('causer')->orderBy('created_at', 'DESC')->get();

        return view('admin.blades.audit.index', [
            'activities' => $activities,
            'settingTheme' => $settingTheme,
            'auditorias' => $auditorias,
            'auditCount' => $auditCount,
        ]);
    }

    public function show(Activity $activitie)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('auditoria.visualizar')){
            return view('admin.error.403');
        }

        $modelName = $activitie->subject_type;
        return view('admin.blades.audit.show')->with([
            'activitie'=>$activitie,
            'modelName'=>$modelName
        ]);
    }
}
