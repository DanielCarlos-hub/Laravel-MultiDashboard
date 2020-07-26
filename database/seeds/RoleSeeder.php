<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'role' => 'Aluno',
            'slug' => 'aluno'
        ]);

        DB::table('roles')->insert([
            'role' => 'Professor',
            'slug' => 'professor'
        ]);
		
		DB::table('roles')->insert([
            'role' => 'Diretor',
            'slug' => 'diretor'
        ]);
		
		DB::table('roles')->insert([
            'role' => 'Administrador',
            'slug' => 'administrador'
        ]);
    }
}
