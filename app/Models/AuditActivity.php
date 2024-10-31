<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditActivity extends Model
{
    use HasFactory;

    public const USERS = 'Usuários';
    public const ROLES = 'Grupos';
    public const SETTINGEMAIL = 'Configuração SMTP';

    public static function getModelName($subjectType)
    {
        switch ($subjectType) {
            
            case User::class:
                return self::USERS;           
            case Role::class:
                return self::ROLES;
            case SettingEmail::class:
                return self::SETTINGEMAIL;
            
            default:
                return 'Desconhecido';
        }
    }
}
