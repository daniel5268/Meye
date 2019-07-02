<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;

class ProfileController extends Controller
{
    private $types = ['Humano','Soko','Bestia'];
    public $strength1 = ['Físico','Mental','Coordinación','Energía'];
    public $strength2 = ['H. Corporales','H. Mentales','H. Energía'];
    public function createPjForm()
    {
    	return view('create_pj')->with([
    		'tipos' => $this->types,
    		'fortaleza1' => $this->strength1,
    		'fortaleza2' => $this->strength2,
    	]);
    }
    public function createPj(Request $request)
    {
    	$validatedData = $request->validate([
	        'nombre' => 'required',
            'tipo'   => ['required',function ($attribute, $value, $fail) {
                   if (!(in_array($value, $this->types))) {
                        $fail('Valor no permitido, Qué extraño');
                    } 
                }],
            'fortaleza1'   => ['required',function ($attribute, $value, $fail) {
                   if (!(in_array($value, $this->strength1))) {
                        $fail('Valor no permitido, Qué extraño');
                    } 
                }],
            'fortaleza2'   => ['required',function ($attribute, $value, $fail) {
                   if (!(in_array($value, $this->strength2))) {
                        $fail('Valor no permitido, Qué extraño');
                    } 
                }],
    	]);
    	$nombre = $request->input('nombre');
    	$tipo = $request->input('tipo');
    	$fortaleza1 = $request->input('fortaleza1');
    	$fortaleza2 = $request->input('fortaleza2');
    	$description = $request->input('description');
    	PjRepo::create($nombre,$tipo,$fortaleza1,$fortaleza2,$description);
    	return redirect()->route('home')->with('message',$nombre.' creado con éxito');
    }
}
