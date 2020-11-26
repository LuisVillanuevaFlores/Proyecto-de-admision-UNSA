<?php

namespace App\Http\Controllers;

use App\Pabellones;
use Illuminate\Http\Request;

class PabellonesController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Pabellon'=>'required|string',
            'Guardero'=>'required|string',
            'Teléfono'=>'required|digits:9'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pabellones::all();
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
        $this->rules['Pabellon']='required|string|unique:pabellones';
        $request->validate($this->rules);
        return Pabellones::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pabellones  $pabellones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pabellones::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pabellones  $pabellones
     * @return \Illuminate\Http\Response
     */
    public function edit(Pabellones $pabellones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pabellones  $pabellones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pabellon=Pabellones::findOrFail($id);
        $request->validate($this->rules);
        $pabellon->update($request->all());
        return $pabellon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pabellones  $pabellones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pabellon=Pabellones::findOrFail($id);
        if($pabellon->aulas->count()>0){
            return response()->json(['error' => "El proceso tiene aulas asociadas,primero debe borrarlas"], 400);
        }
        $pabellon->delete();
    }
}
