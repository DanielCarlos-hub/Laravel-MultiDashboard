<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false; //Desativar o timestamps para a tabela de Role, 
	//assim o Model não busca pelos campos created_at e updated_at na tabela de roles.

    protected $fillable = [
        'role', 'slug'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
