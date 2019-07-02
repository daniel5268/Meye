<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;

class ProfileController extends Controller
{
    public function createPjForm()
    {
    	return view('create_pj')->with([
    		'tipos' => ['Humano','Soko','Bestia'],
    		'fortaleza1' => ['Físico','Mental','Coordinación','Energía'],
    		'fortaleza2' => ['H. Corporales','H. Mentales','H. Energía'],
    	]);
    }
    public function createPj(Request $request)
    {
    	$validatedData = $request->validate([
	        'nombre' => 'required'
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
