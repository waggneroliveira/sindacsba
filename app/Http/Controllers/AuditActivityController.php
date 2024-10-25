<?php

namespace App\Http\Controllers;

use App\Models\SettingTheme;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class AuditActivityController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        if ($currentUser) {
            $settingTheme = SettingTheme::where('user_id', $currentUser->id)->first();
        } else {
            $settingTheme = new SettingTheme();
        }
        
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('auditoria.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }

        $activities = Activity::with('causer')->orderBy('created_at', 'DESC')->get();

        return view('admin.blades.audit.index', [
            'activities' => $activities,
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
