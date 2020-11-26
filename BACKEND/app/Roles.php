<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model

{
	protected $table='roles';
    protected $fillable = ['Tipo_Participante','Rol'];
    public function proceso__participantes(){
		return $this->hasMany(Proceso_Participantes::class,'Rol_id');
	}
}
