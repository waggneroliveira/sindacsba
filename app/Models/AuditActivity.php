<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditActivity extends Model
{
    use HasFactory;

    public const USERS = 'Usuários';
    public const ROLES = 'Grupos';

    public static function getModelName($subjectType)
    {
        switch ($subjectType) {
            
            case User::class:
                return self::USERS;           
            case Role::class:
                return self::ROLES;
            
            default:
                return 'Desconhecido';
        }
    }
}
