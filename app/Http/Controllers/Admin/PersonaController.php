<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\createPersona;
use App\Models\Persona;
use App\Models\ProjectPersona;
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

    public function newPersona(Request $request)
    {
        return view('theme.admin.persona.add-new-persona',[
            'project_id' => $request->project
        ]);
    }

    public function savePersona(Request $request)
    {
        $hobbies = $this->Hobbies($request);
        $leisure = $this->Leisure($request);
        $media = $this->Media($request);
        $influencers = $this->Influencer($request);
        $website = $this->Website($request);
        $exist = Persona::where('persona_name', '=', $request->persona_name)->first();
        if(is_null($exist)) {
           $persona = Persona::create([
                'persona_name' => $request->persona_name,
                'job' => $request->job,
                'career_path' => $request->career_path,
                'family' => $request->family,
                'hobbies' => $hobbies,
                'leisure_time' => $leisure,
                'media' => $media,
                'influnencrs' => $influencers,
                'website' => $website,
            ]);
           ProjectPersona::create([
               'project_id' => $request->project_id,
               'persona_id' => $persona->id
           ]);
            return redirect()->route('editProject',[$request->project_id.'?tab=persona'])->with('success', 'Persona Added Successfully...!');
        } else {
            return redirect()->back()->with('error', 'Persona already exist...!');
        }
    }

    public function Hobbies($request) {
        $hobbies = json_decode($request->hobbies);
        $hobbies_String = Array();
        foreach ($hobbies as $key) {
            array_push($hobbies_String, $key->value);
        }
        return implode(",", $hobbies_String);
    }
    public function Leisure($request) {
        $leisure = json_decode($request->leisure_time);
        $leisure_String = Array();
        foreach ($leisure as $key) {
            array_push($leisure_String, $key->value);
        }
        return implode(",", $leisure_String);
    }
    public function Media($request) {
        $media = json_decode($request->media);
        $media_String = Array();
        foreach ($media as $key) {
            array_push($media_String, $key->value);
        }
        return implode(",", $media_String);
    }
    public function Influencer($request) {
        $influencers = json_decode($request->influencers);
        $influencers_String = Array();
        foreach ($influencers as $key) {
            array_push($influencers_String, $key->value);
        }
        return implode(",", $influencers_String);
    }
    public function Website($request) {
        $website = json_decode($request->website);
        $website_String = Array();
        foreach ($website as $key) {
            array_push($website_String, $key->value);
        }
        return implode(",", $website_String);
    }

    public function deletePersona(Request $request,$id)
    {
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->route('editProject',[$request->project.'?tab=persona'])->with('success', 'Persona Deleted Successfully...!');
    }

    public function editPersona(Request $request,$id)
    {
        $persona = Persona::find($id);
        return view('theme.admin.persona.editPersona',[
            'persona' => $persona,
            'project_id' => $request->project
        ]);
    }

    public function UpdatePersona(Request $request)
    {
        $persona =  Persona::where('id', '=', $request->personaId);
        $hobbies = $this->Hobbies($request);
        $leisure = $this->Leisure($request);
        $media = $this->Media($request);
        $influencers = $this->Influencer($request);
        $website = $this->Website($request);
        $exist = Persona::where('persona_name', '=', $request->persona_name)->first();
        if(!is_null($exist) && $exist->id != $request->personaId){
            return redirect()->back()->with('error', 'Persona already exist...!');
        }
        $persona->update([
            'persona_name' => $request->persona_name,
            'job' => $request->job,
            'career_path' => $request->career_path,
            'family' => $request->family,
            'hobbies' => $hobbies,
            'leisure_time' => $leisure,
            'media' => $media,
            'influnencrs' => $influencers,
            'website' => $website,
        ]);
        return redirect()->route('editProject',[$request->project_id.'?tab=persona'])->with('success', 'Persona Added Successfully...!');
    }

}
