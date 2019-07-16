<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function createPjForm()
    {
    	$types = PjRepo::getPossibleTypes();
        $strength1 = PjRepo::getPossibleStrength1();
        $strength2 = PjRepo::getPossibleStrength2();
        $data = [
            'tipos' => $types,
            'fortaleza1' => $strength1,
            'fortaleza2' => $strength2
        ];
        return view('create_pj')->with($data);
    }
    public function createPj(Request $request)
    {
        $validatedData = $request->validate([
	        'nombre' => 'required',
            'tipo'   => ['required',function ($attribute, $value, $fail) {
                    $types = PjRepo::getPossibleTypes();
                    if (!(in_array($value, $types))) {
                        $fail('Valor no permitido, Qué extraño');
                    } 
                }],
            'fortaleza1'   => ['required',function ($attribute, $value, $fail) {
                    $strength1 = PjRepo::getPossibleStrength1();
                    if (!(in_array($value, $strength1))) {
                        $fail('Valor no permitido, Qué extraño');
                    } 
                }],
            'fortaleza2'   => ['required',function ($attribute, $value, $fail) {
                    $strength2 = PjRepo::getPossibleStrength2();
                    if (!(in_array($value, $strength2))) {
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
            $data[$pj->id]['edad'] = $pj->edad;
            // Comportamiento
            $data[$pj->id]['cordura'] = $pj->cordura;
            $data[$pj->id]['carisma'] = $pj->carisma;
            $data[$pj->id]['villania'] = $pj->villania;
            $data[$pj->id]['heroismo'] = $pj->heroismo;
            //visual
            $data[$pj->id]['peso'] = $pj->peso;
            $data[$pj->id]['altura'] = $pj->altura;
            $data[$pj->id]['apariencia'] = $pj->apariencia;
            $f1 = str_replace('ó','o',str_replace('í', 'i', $pj->fortaleza1));
            $f2 = str_replace(' ', '-', $pj->fortaleza2);
            $f2 = str_replace('.', '', $f2);
            $f2 = str_replace('í', 'i', $f2);
            $data[$pj->id]['fortaleza1'] = $f1;
            $data[$pj->id]['fortaleza2'] = $f2;
            $data[$pj->id]['description'] = $pj->description;
            $data[$pj->id]['bolsa'] = $pj->bolsa;
            
            $data[$pj->id]['section1'] = [];  
            $data[$pj->id]['section1']['Físicos'] = [];
            $data[$pj->id]['section1']['Mentales'] = [];
            $data[$pj->id]['section1']['Coordinación'] = [];

            $data[$pj->id]['section1']['Físicos']['Fuerza'] = ['fuer',$pj->fuer];
            $data[$pj->id]['section1']['Físicos']['Velocidad'] = ['velo',$pj->velo];
            $data[$pj->id]['section1']['Físicos']['Agilidad'] = ['agil',$pj->agil];
            $data[$pj->id]['section1']['Físicos']['Resistencia'] = ['resi',$pj->resi];
            
            $data[$pj->id]['section1']['Mentales']['Inteligencia'] = ['inte',$pj->inte];
            $data[$pj->id]['section1']['Mentales']['Sabiduria'] = ['sabi',$pj->sabi];
            $data[$pj->id]['section1']['Mentales']['Concentración'] = ['conc',$pj->conc];
            $data[$pj->id]['section1']['Mentales']['Voluntad'] = ['volu',$pj->volu];

            $data[$pj->id]['section1']['Coordinación']['Precisión'] = ['prec',$pj->prec];
            $data[$pj->id]['section1']['Coordinación']['Cálculo'] = ['calc',$pj->calc];
            $data[$pj->id]['section1']['Coordinación']['Rango'] = ['rang',$pj->rang];
            $data[$pj->id]['section1']['Coordinación']['Reflejos'] = ['refl',$pj->refl];            
            


            $data[$pj->id]['tanks'] = [];
            $data[$pj->id]['tanks']['Vida'] = ['vida',$pj->vida];            
            $data[$pj->id]['tanks']['Energía'] = ['ener',$pj->ener];            
            
            if($pj->fortaleza1 == 'Energía'){
                $data[$pj->id]['tanks']['_Energía'] = ['ener2',$pj->ener2];
            }
            
            $data[$pj->id]['section2'] = [];
            $data[$pj->id]['section2']['H-Corporales'] = [];
            $data[$pj->id]['section2']['H-Energía'] = [];
            $data[$pj->id]['section2']['H-Mentales'] = [];

            $data[$pj->id]['section2']['H-Corporales']['Potenciación'] = ['pote',$pj->pote];
            $data[$pj->id]['section2']['H-Corporales']['Control vital'] = ['vita',$pj->vita];
            
            $data[$pj->id]['section2']['H-Mentales']['Ilución'] = ['iluc',$pj->iluc];
            $data[$pj->id]['section2']['H-Mentales']['Manipular'] = ['ment',$pj->ment];
            
            $data[$pj->id]['section2']['H-Energía']['Manipulación Obj.'] = ['obje',$pj->obje];
            $data[$pj->id]['section2']['H-Energía']['Energía'] = ['pura',$pj->pura];
            
            $data[$pj->id]['renels'] = $pj->renels;
            $data[$pj->id]['xp1'] = $pj->xp1;
            $data[$pj->id]['xp2'] = $pj->xp2;
            
            
            if($pj->tipo=='Soko'){
                //Necesita actualización dependiendo del soko
                $data[$pj->id]['hs1'] = $pj->hs1;
                $data[$pj->id]['hs2'] = $pj->hs2;
                $data[$pj->id]['hs3'] = $pj->hs3;
                $data[$pj->id]['hs4'] = $pj->hs4;
                $data[$pj->id]['xp3'] = $pj->xp3;
            }
            
        }
        //dd($data);
        $replace = [];
        $replace['H-Corporales']="H. Corporales";
        $replace['H-Mentales']="H. Mentales";
        $replace['H-Energía']="H. Energía";
        $replace['_Energía']="Energía esp.";
        return view('list_pjs')->with(['pjs' => $data,'replace'=>$replace]);
    }
    public function updatePj(Request $request)
    {   
        $validatedData = $request->validate([
            'id' => 'required|exists:pjs',
            'fuer' => 'required|numeric|min:0',
            'velo' => 'required|numeric|min:0',
            'agil' => 'required|numeric|min:0',
            'resi' => 'required|numeric|min:0',
            'inte' => 'required|numeric|min:0',
            'sabi' => 'required|numeric|min:0',
            'conc' => 'required|numeric|min:0',
            'volu' => 'required|numeric|min:0',
            'prec' => 'required|numeric|min:0',
            'rang' => 'required|numeric|min:0',
            'calc' => 'required|numeric|min:0',
            'refl' => 'required|numeric|min:0',
            'vida' => 'required|numeric|min:0',
            'ener' => 'required|numeric|min:0',
            'ener2' => 'numeric|min:0',
            'pote' => 'required|numeric|min:0',
            'vita' => 'required|numeric|min:0',
            'obje' => 'required|numeric|min:0',
            'pura' => 'required|numeric|min:0',
            'iluc' => 'required|numeric|min:0',
            'ment' => 'required|numeric|min:0',
        ]);
        $pj = PjRepo::findById($request->id);
        if ($pj->user_id != Auth::user()->id){
            return redirect()->back()->with('warning','Acceso denegado');    
        }
        $data = $request->all();
        $answer = PjRepo::updateIfValid($data);
        return redirect()->back()->with($answer);
    }
}
