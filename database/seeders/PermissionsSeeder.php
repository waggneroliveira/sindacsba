<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'auditoria'=>[
                'Visualizar',
            ],
            'email'=>[
                'Visualizar',
                'configurar smtp',
                'testar conexao smtp'
            ],
            'categorias do blog'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'slide'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'stack'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'grupo'=>[
                'Criar',
                'Editar',                
                'Visualizar',
                'Remover'
            ],
            'notificacao'=>[               
                'Visualizar',
                'Notificacao de auditoria',
            ],
            'usuario'=>[
                'Criar',
                'Editar',
                'Visualizar',
                'Remover',
                'Visualizar outros usuarios',
                'Atribuir grupos',
                'Tornar usuario master'
            ],
        ];

        foreach($permissions as $key => $permission){
            foreach($permission as $value){
                Permission::create([
                    'name'=>strtolower("{$key}.{$value}")
                ]);
            }
        }
    }
}
