<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $rules;
    public function __construct() 
    {
        $this->rules=[
            'Rol'=>'required|string',
            'Tipo_Participante'=>'required|string'
        ];
    }
    public function index()
    {
        return Roles::all();
    }


    public function store(Request $request)
    {
        $this->rules['Rol']='required|string|unique:roles';
        $request->validate($this->rules);
        return Roles::create($request->all());
    }

   
    public function show( $id)
    {
        return Roles::findOrFail($id);
    }

    
    
    public function update(Request $request, $id)
    {
        $rol=Roles::findOrFail($id);
        $request->validate($this->rules);
        $rol->update($request->all());
        return $rol;
    }

    
    public function destroy($id)
    {
        $rol=Roles::findOrFail($id);
        if($rol->proceso__participantes->count()>0){
            return response()->json(['error' => "El rol tiene un participante asociado,primero debe borrarlo"], 400);
        }
        $rol->delete();
    }
}
