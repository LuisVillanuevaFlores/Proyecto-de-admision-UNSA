<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pabellones extends Model
{
    protected $fillable = [
        'Pabellon','Guardero', 'Teléfono'
    ];
    public function aulas(){
		return $this->hasMany(Aulas::class,'Pabellon_id');
	}
}
