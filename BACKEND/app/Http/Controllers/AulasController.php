<?php

namespace App\Http\Controllers;

use App\Aulas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AulasController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Pabellon_id'=>'required',
            'Aula_Nro'=>'required',
            'Código'=>'required',
            'Piso'=>'required|digits:1',
            'Aforo'=>'required',
            'Filas'=>'required',
            'Columnas'=>'required',
            'Situación'=>'required|string'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Aulas::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->rules['Código']='required|digits:4|unique:aulas';
        //$request->validate($this->rules);
        return Aulas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Aulas::findOrFail($id);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$aula=Aulas::findOrFail($id);
        $request->validate($this->rules);
        $aula->update($request->all());
        return $aula;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aula=Aulas::findOrFail($id);
        if($aula->proceso__participantes->count()>0){
            return response()->json(['error' => "El aula tiene un proceso asociado,primero debe borrarlo"], 400);
        }
        $aula->delete();
    }
}
