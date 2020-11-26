<?php

namespace App\Http\Controllers;

use App\Participantes;
use Illuminate\Http\Request;

class ParticipantesController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Tipo_Participante'=>'required|string',
            'Tipo_Documento'=>'required|string',
            'Nro_Documento'=>'required|digits:9',
            'Apellidos'=>'required|string',
            'Nombres'=>'required|string',
            'Fecha_Nacimiento'=>'required|date',
            'Sexo'=>'required|string',
            'Correo'=>'required|email',
            'Teléfono'=>'required|digits:9',
            'Situación'=>'required|string',
            'CUI'=>'required|digits:8'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Participantes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->rules['Correo']='required|email|unique:participantes';
        //$request->validate($this->rules);
        return Participantes::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Participantes::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Participantes $participantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Participante=Participantes::findOrFail($id);

        //$request->validate($this->rules);
        $Participante->update($request->all());
        return $Participante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Participante=Participantes::findOrFail($id);
        if($Participante->proceso__participantes->count()>0){
            return response()->json(['error' => "El participante tiene un proceso asociado,primero debe borrarlo"], 400);
        }
        $Participante->delete();
    }
}
