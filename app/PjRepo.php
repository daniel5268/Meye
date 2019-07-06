<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class PjRepo extends Model
{
    public static function create($nombre,$tipo,$fortaleza1,$fortaleza2,$description)
    {
    	$id = Auth::user()->id;
    	$entitie = new Pj;
		$entitie->user_id = $id;
		$entitie->nombre = $nombre;
		$entitie->tipo = $tipo;
		$entitie->fortaleza1 = $fortaleza1;
		$entitie->fortaleza2 = $fortaleza2;
		$entitie->description = $description;
		$entitie->save();
		return $entitie;
    }
	public static function allMine()
	{
    	$id = Auth::user()->id;
    	return Pj::query()->where('user_id','=',$id)->get();		
	} 
	public static function allPjs(){
		return Pj::all();
	}

	public static function modify($data){
		$pj = Pj::query()->where('id','=',$data['id'])->first();
		$pj->edad=$data['edad'];
		$pj->altura=$data['altura'];
		$pj->peso=$data['peso'];
		$pj->bolsa=$data['bolsa'];
		$pj->cordura=$data['cordura'];
		$pj->carisma=$data['carisma'];
		$pj->villania=$data['villania'];
		$pj->heroismo=$data['heroismo'];
		$pj->apariencia=$data['apariencia'];
		$pj->description=$data['description'];
		$pj->commerce=array_key_exists('commerce', $data);
		$pj->save();		
	}
	public static function getPossibleTypes(){
		return ['Humano','Soko','Bestia'];
	}
	public static function getPossibleStrength1(){
		return ['Físico','Mental','Coordinación','Energía'];
	}
	public static function getPossibleStrength2(){
		return ['H. Corporales','H. Mentales','H. Energía'];
	}

	public static function getPossibleAssignationTypes($type){
		if (($type == 'Humano')||($type == 'Bestia')){
			return ['Tipo 1','Tipo 2','Renels'];
		}
		if($type=='Soko'){
			return ['Tipo 1','Tipo 2','Tipo 3','Renels'];
		}else{
			dd('getPossibleXpTypes($type) where $type',$type);
		}
	}
	public static function assignation($data)
	{
		$pj = Pj::query()->where('id','=',$data['id'])->first();
		switch ($data['type']) {
			case 'Tipo 1':
				$pj->xp1 = $pj->xp1 +$data['amount'];
				break;
			case 'Tipo 2':
				$pj->xp2 = $pj->xp2 +$data['amount'];
				break;
			case 'Tipo 3':
				$pj->xp3 = $pj->xp3 +$data['amount'];
				# code...
				break;
			case 'Renels':
				$pj->renels = $pj->renels +$data['amount'];
				break;
			default:
				dd("in assignation PjRepo type ",$data['type']);
				break;
		}
		$pj->save();
	}
	
}
