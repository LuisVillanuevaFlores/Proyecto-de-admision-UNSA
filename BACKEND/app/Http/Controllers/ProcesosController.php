<?php

namespace App\Http\Controllers;

use App\Procesos;
use Illuminate\Http\Request;

class ProcesosController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Proceso'=>'required|string',
            'Fecha'=>'required|date',
            'Situacion'=>'required|string'
        ];
    }
   
    public function index()
    {
        return Procesos::all();
    }


    public function store(Request $request)
    {
        $this->rules['Proceso']='required|string|unique:procesos';
        $request->validate($this->rules);
        return Procesos::create($request->all());
    }

   
    public function show($id)
    {
        return Procesos::findOrFail($id);
    }

    
    
    public function update(Request $request,$id)
    {
        $proceso=Procesos::findOrFail($id);
        $request->validate($this->rules);
        $proceso->update($request->all());
        return $proceso;
    }

    
    public function destroy($id)
    {
        $proceso=Procesos::findOrFail($id);
        if($proceso->proceso__participantes->count()>0){
            return response()->json(['error' => "El proceso tiene un participante asociado,primero debe borrarlo"], 400);
        }
        $proceso->delete();

    }
}