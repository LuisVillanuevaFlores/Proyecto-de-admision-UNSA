<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
	protected $table='procesos';
    protected $fillable = ['Proceso','Fecha','Situacion'];
    public function proceso__participantes(){
		return $this->hasMany(Proceso_Participantes::class,'Proceso_id');
	}
}
