<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditActivity extends Model
{
    use HasFactory;

    public static function getModelName($subjectType)
    {
        switch ($subjectType) { 
           
            case Announcement::class:
                return 'Anuncios';
            case Noticies::class:
                return 'Editais';
            case Contact::class:
                return 'Contato';
            case FormIndex::class:
                return 'Lead contato - Infrmações enviadas pelo site (formulário de contato)';
            case Newsletter::class:
                return 'Newsletter - E-mail enviado pelo site';
            case BlogCategory::class:
                return 'Categoria de notícias';
            case Blog::class:
                return 'Notícias';
            case Slide::class:
                return 'Slides';
            case User::class:
                return __('blades/audit.users');
            case Role::class:
                return __('blades/audit.roles');
            case SettingEmail::class:
                return __('blades/audit.setting_email');
            default:
                return __('blades/audit.system');

        }
    }
}
