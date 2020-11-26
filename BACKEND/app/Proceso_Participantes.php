<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso_Participantes extends Model
{
    protected $table='proceso__participantes';
    protected $fillable = [
        'Proceso_id','Participante_id', 'Rol_id', 'Aula_id','Entrega_DJ','Asistencia'
    ];
}
