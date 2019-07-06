<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;
use App\AssignationRepo;

class MasterController extends Controller
{
    public function managePjForm()
    {
		$pjs = PjRepo::allPjs();
        $data = [];
        foreach ($pjs as $pj){
        	$data[$pj->id]=[];
        	$data[$pj->id]['nombre'] = $pj->nombre;
        	$data[$pj->id]['edad'] = $pj->edad;
        	$data[$pj->id]['altura'] = $pj->altura;
        	$data[$pj->id]['peso'] = $pj->peso;
        	$data[$pj->id]['description'] = $pj->description;
        	$data[$pj->id]['commerce'] = $pj->commerce;
        	$data[$pj->id]['bolsa'] = $pj->bolsa;
        	$data[$pj->id]['cordura'] = $pj->cordura;
        	$data[$pj->id]['carisma'] = $pj->carisma;
        	$data[$pj->id]['villania'] = $pj->villania;
        	$data[$pj->id]['heroismo'] = $pj->heroismo;
        	$data[$pj->id]['apariencia'] = $pj->apariencia;
        	$data[$pj->id]['xpTypes'] = PjRepo::getPossibleAssignationTypes($pj->tipo);
        }
        return view('pjs_menu')->with([
                'pjs' => $data,
            ]);
    }
    function managePj(Request $request){
    	$data=$request->all();
    	PjRepo::modify($data);
    	return redirect()->route('managePj')->with(['message'=>'Pj modificado con éxito','last'=>$data['id']]);
    }

    public function assignation(Request $request)
    {
        $data=$request->all();
        PjRepo::assignation($data);
        
        return redirect()->back()->with(['message'=>'Asignación realizada con éxito','last'=>$data['id']]);
    }
}
