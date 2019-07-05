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
}
