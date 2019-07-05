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

	public static function getPossibleXpTypes($type){
		if (($type == 'Humano')||($type == 'Bestia')){
			return ['Tipo 1','Tipo 2'];
		}
		if($type=='Soko'){
			return ['Tipo 1','Tipo 2','Tipo 3'];
		}else{
			dd('getPossibleXpTypes($type) where $type',$type);
		}
	}
	
}
