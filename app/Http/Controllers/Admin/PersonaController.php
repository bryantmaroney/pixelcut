<?php

namespace App\Http\Controllers\Admin;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonaController extends Controller
{
    public function listPersona(Request $request)
    {
        $data = Persona::orderby('id','desc')->paginate(10);
        return view('theme.admin.persona.list-personas',[
            'data' => $data
        ]);
    }

    public function newPersona()
    {
        return view('theme.admin.persona.add-new-persona');
    }

    public function savePersona(Request $request)
    {
            Persona::create($request->all());
            return redirect()->to(route('list-Persona'))->with('success', 'Persona Added Successfully...!');
    }

    public function deletePersona($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->to(route('list-Persona'))->with('success', 'Persona Deleted Successfully...!');
    }

    public function editPersona($id)
    {
        $persona = Persona::find($id);
        return view('theme.admin.persona.editPersona',[
            'persona' => $persona
        ]);
    }

    public function UpdatePersona(Request $request)
    {
        $persona =  Persona::where('id', '=', $request->personaId);
        $persona->update([
            'persona_name' => $request->persona_name,
        ]);
        return redirect()->to(route('list-Persona'))->with('success', 'Persona Updated Successfully...!');
    }

}
