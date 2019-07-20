<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PjRepo;
use App\AssignationRepo;
use App\Obj;
use App\Obj_ownership;

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
            $data[$pj->id]['storage'] = $pj->storage;
        	
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
            $ownerships = $pj->obj_ownerships;
            $data[$pj->id]['objects'] = [];
            foreach ($ownerships as $ownership){
                $obj = $ownership->obj;
                $data[$pj->id]['objects'][$ownership->id] = ['name'=>$obj->name,'allowed'=>$ownership->allowed];
            }
        }

        return view('pjs_menu')->with([
                'pjs' => $data,
            ]);
    }
    public function managePj(Request $request){
    	$data=$request->all();
    	PjRepo::modify($data);
    	return redirect()->route('managePj')->with(['message'=>'Pj modificado con éxito','last'=>$data['id']]);
    }

    public function manageOwnerships(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        unset($data['_token']);
        unset($data['id']);
        foreach ($data as $key => $value){
            Obj_ownership::where('id', $key)->update(['allowed'=>$value]);            
        }
        return redirect()->back()->with(['message'=>'Comercio modificado con éxito','last'=>$id]);
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
        
        $pjs = PjRepo::allPjs();
        $pjArray=[];
        foreach ($pjs as $pj) {
            $pjArray[$pj->id] = ['name'=>$pj->name]; 
        }
        
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
        $pjs = PjRepo::allPjs();
        $data = [
            'obj_id' => $obj->id 
        ];
        foreach ($pjs as $pj){
            $data['pj_id']=$pj->id;
            Obj_ownership::create($data);
        }
        return redirect()->back()->with('message',$obj->name.' creado con éxito');
    }
    public function updateObject(Request $request)
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
        Obj::where('id', $data['id'])->update($data);
        return redirect()->back()->with(['message'=>$data['name'].' modificado con éxito','last'=>$data['id']]);
    }
    public function deleteObject(Request $request)
    {
        Obj_ownership::where('obj_id', '=', $request->id)->delete();
        Obj::where('id', '=', $request->id)->delete();
        return redirect()->back()->with('warning','Objeto eliminado con éxito');
    }
}
