<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
     protected $fillable = [
        'Pabellon_id','Aula_Nro', 'Código', 'Piso','Aforo','Filas','Columnas','Situación'
    ];
    public function proceso__participantes(){
		return $this->hasMany(Proceso_Participantes::class,'Aula_id');
	}
}
