<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
  protected $table='participantes';
	protected $fillable = [
        'Tipo_Participante','Tipo_Documento', 'Nro_Documento', 'Apellidos','Nombres','Fecha_Nacimiento','Sexo','Correo','Teléfono','Situación','CUI'
    ];
    public function proceso__participantes(){
		return $this->hasMany(Proceso_Participantes::class,'Participante_id');
	}
}
