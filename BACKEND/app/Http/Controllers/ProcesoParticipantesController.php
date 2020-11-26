<?php

namespace App\Http\Controllers;

use App\Proceso_Participantes;
use Illuminate\Http\Request;

class ProcesoParticipantesController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Proceso_id'=>'required',
            'Participante_id'=>'required',
            'Rol_id'=>'required',
            'Aula_id'=>'required',
            'Entrega_DJ'=>'required|string',
            'Asistencia'=>'required'

        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Proceso_Participantes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate($this->rules);
        return Proceso_Participantes::create($request->all());    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proceso_Participantes  $proceso_Participantes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Proceso_Participantes::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proceso_Participantes  $proceso_Participantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso_Participantes $proceso_Participantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proceso_Participantes  $proceso_Participantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Proceso_Participante=Proceso_Participantes::findOrFail($id);
        $request->validate($this->rules);
        $Proceso_Participante->update($request->all());
        return $Proceso_Participante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proceso_Participantes  $proceso_Participantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Proceso_Participante=Proceso_Participantes::findOrFail($id);
        $Proceso_Participante->delete();
    }
}
