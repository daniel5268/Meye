<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;
use Illuminate\Support\Facades\Auth;

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
    
    public function listPjs()
    {
        $pjs = PjRepo::allMine();
        $data = [];
        foreach ($pjs as $pj) {
            //general
            $data[$pj->id] = [];
            $data[$pj->id]['nombre'] = $pj->nombre;
            $data[$pj->id]['tipo'] = $pj->tipo;
            $data[$pj->id]['edad'] = $pj->edad ;
            // Comportamiento
            $data[$pj->id]['cordura'] = $pj->cordura;
            $data[$pj->id]['carisma'] = 7;
            $data[$pj->id]['villania'] = 5;
            $data[$pj->id]['heroismo'] = 3;
            //visual
            $data[$pj->id]['peso'] = $pj->peso;
            $data[$pj->id]['altura'] = $pj->altura;
            $data[$pj->id]['apariencia'] = 8;
            
            $data[$pj->id]['fortaleza1'] = $pj->fortaleza1;
            $data[$pj->id]['fortaleza2'] = $pj->fortaleza2;
            $data[$pj->id]['description'] = $pj->description;
            $data[$pj->id]['bolsa'] = $pj->bolsa;
            $data[$pj->id]['vida'] = $pj->vida;
            $data[$pj->id]['ener'] = $pj->ener;
            $data[$pj->id]['ener2'] = $pj->ener2;
            $data[$pj->id]['fuer'] = $pj->fuer;
            $data[$pj->id]['agil'] = $pj->agil;
            $data[$pj->id]['velo'] = $pj->velo;
            $data[$pj->id]['resi'] = $pj->resi;
            $data[$pj->id]['inte'] = $pj->inte;
            $data[$pj->id]['sabi'] = $pj->sabi;
            $data[$pj->id]['conc'] = $pj->conc;
            $data[$pj->id]['volu'] = $pj->volu;
            $data[$pj->id]['prec'] = $pj->prec;
            $data[$pj->id]['calc'] = $pj->calc;
            $data[$pj->id]['rang'] = $pj->rang;
            $data[$pj->id]['refl'] = $pj->refl;
            $data[$pj->id]['pote'] = $pj->pote;
            $data[$pj->id]['vita'] = $pj->vita;
            $data[$pj->id]['pura'] = $pj->pura;
            $data[$pj->id]['obje'] = $pj->obje;
            $data[$pj->id]['iluc'] = $pj->iluc;
            $data[$pj->id]['ment'] = $pj->ment;
            $data[$pj->id]['hs1'] = $pj->hs1;
            $data[$pj->id]['hs2'] = $pj->hs2;
            $data[$pj->id]['hs3'] = $pj->hs3;
            $data[$pj->id]['hs4'] = $pj->hs4;

        }
        return view('list_pjs')->with([
                'pjs' => $data
            ]);

    }
}
