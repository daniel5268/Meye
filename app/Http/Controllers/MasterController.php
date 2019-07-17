<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;
use App\AssignationRepo;
use App\Obj;

class MasterController extends Controller
{
    public function managePjForm()
    {
		$pjs = PjRepo::allPjs();
        $data = [];
        foreach ($pjs as $pj){
        	$data[$pj->id]=[];
        	$data[$pj->id]['nombre'] = $pj->nombre;
        	$data[$pj->id]['commerce'] = $pj->commerce;
        	
            $data[$pj->id]['numeric'] = [];
            
            $data[$pj->id]['numeric']['edad'] = ['Edad',$pj->edad,0,10000];
        	$data[$pj->id]['numeric']['altura'] = ['Altura',$pj->altura,0,10000];
        	$data[$pj->id]['numeric']['peso'] = ['Peso',$pj->peso,0,10000];
        	$data[$pj->id]['numeric']['bolsa'] = ['Tamaño de equipo',$pj->bolsa,0,18];
        	$data[$pj->id]['numeric']['cordura'] = ['Locura',$pj->cordura,0,20];
        	$data[$pj->id]['numeric']['carisma'] = ['Carisma',$pj->carisma,-10,10];
        	$data[$pj->id]['numeric']['villania'] = ['Villanía',$pj->villania,0,10];
        	$data[$pj->id]['numeric']['heroismo'] = ['Heroísmo',$pj->heroismo,0,10];
        	$data[$pj->id]['numeric']['apariencia'] = ['Apariencia',$pj->apariencia,0,20];
        	
        	$data[$pj->id]['description'] = $pj->description;
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

    public function manageObjectsForm()
    {
        $info = Obj::atributeInfo();
        $bool = [
            'standard'=>$info['standard'],
            'packable'=>$info['packable'],
        ];
        unset($info['standard']);
        unset($info['packable']);
        $objects = Obj::all();
        $data=[];
        foreach ($objects as $object) {
            $data[$object->id] = $object->toArray();
            unset($data[$object->id]['id']);
        }
        return view('objects_menu')->with([
                'objects' => $data,
                'types' => $info,
                'bool' => $bool
            ]);
    }
    public function createObject(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'damage'=>'numeric',
            'resistence'=>'numeric',
            'of_blood'=>'numeric',
            'cushioned'=>'numeric',
            'weight'=>'numeric',
            'throw'=>'numeric',
            'duration'=>'numeric',
        ]);
        $data = $request->all();
        $stand = array_key_exists('standard',$data);
        $pack  = array_key_exists('packable',$data);
        if ($stand and !$pack){
            return redirect()->back()->with('warning','No se permiten objetos estandar no equipables');
        }
        $data['standard']=$stand;
        $data['packable']=$pack;
        unset($data['_token']);
        $obj=Obj::create($data);
        return redirect()->back()->with('message','Objeto creado con éxito');
        
        
    }
}
