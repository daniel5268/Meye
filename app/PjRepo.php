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
		$pj->storage=array_key_exists('storage', $data);
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

	public static function updatePj($data)
	{
		Pj::where('id', $data['id'])->update($data);
	}
	
	public static function findById($id)
	{
		return Pj::query()->where('id','=',$id)->first();
	}

	public static function getT1Keys(){
		return ['fuer','velo','agil','resi','inte','sabi','conc','volu','prec','calc','rang','refl','vida'];
	}

	public static function getT2Keys(){
		return ['pote','vita','obje','pura','ment','iluc','ener','ener2'];
	}

	public static function getT1SrengthKeys($strengh)
	{
		switch ($strengh) {
			case 'Físico':
				return ['fuer','velo','agil','resi'];
			case 'Mental':
				return ['inte','sabi','conc','volu'];
			case 'Coordinación':
				return ['prec','calc','rang','refl'];
			case 'Energía':
				return [];
			default:
				dd('in PjRepo::getT1SrengthKeys strenght not defined',$strengh);
				break;
		}
	}
	public static function getT2SrengthKeys($strengh)
	{
		switch ($strengh) {
			case 'H. Mentales':
				return ['iluc','ment'];
			case 'H. Corporales':
				return ['pote','vita'];
			case 'H. Energía':
				return ['pura','obje'];
			default:
				dd('in PjRepo::getT2SrengthKeys strenght not defined',$strengh);
				break;
		}
	}
	

	
	public static function getSpent($pj)
	{
		$keys = self::getT1Keys();
		$keys = \array_diff($keys, ['vida']);
		$strenghtKeys = self::getT1SrengthKeys($pj['fortaleza1']);

		$spent['1'] = 0;
		foreach ($keys as $key){
			$d = intdiv($pj[$key],10);
			$u = $pj[$key]%10;
			if (in_array($key,$strenghtKeys)){
				$spent['1'] += ((5*$d*$d)+(5*$d)+($u*$d)+$u);
			}else{
				$d+=2;
				$spent['1'] += ((5*$d*$d)+(5*$d)+($u*$d)+$u)-30;
			}
		}
		$spent['1']+= $pj['vida']*5;

		$keys = self::getT2Keys();
		$keys = \array_diff($keys, ['ener','ener2']);
		$strenghtKeys = self::getT2SrengthKeys($pj['fortaleza2']);

		$spent['2'] = 0;
		foreach ($keys as $key){
			$d = intdiv($pj[$key],100);
			$u = $pj[$key]%100;
			if (in_array($key,$strenghtKeys)){
				$spent['2'] += ((50*$d*$d)+(50*$d)+($u*$d)+$u);
			}else{
				$d+=1;
				$spent['2'] += ((50*$d*$d)+(50*$d)+($u*$d)+$u)-100;
			}
		}
		if ($pj['fortaleza1']=='Energía'){
			$spent['2']+= $pj['ener']*5;
			$spent['2']+= $pj['ener2']*5;
		}else{
			$spent['2']+= $pj['ener']*10;
		}
		return $spent;
	}
	public static function atributeNamesReplace()
	{
		return [
			'fuer'=>'Fuerza',
			'agil'=>'Agilidad',
			'velo'=>'Velocidad',
			'resi'=>'Resistencia',
			'inte'=>'Inteligencia',
			'conc'=>'Concentración',
			'sabi'=>'Sabiduría',
			'volu'=>'Voluntad',
			'prec'=>'Precisión',
			'rang'=>'Rango',
			'calc'=>'Cálculo',
			'refl'=>'Reflejos',
			'vida'=>'Vida',
			'ener'=>'Energía',
			'ener2'=>'Energía esp.',
			'pote'=>'Potenciación',
			'vita'=>'Control vital',
			'pura'=>'Energía pura',
			'obje'=>'Control de objetos',
			'iluc'=>'Ilución',
			'ment'=>'Control mental',
		];
	}
	public static function updateIfValid($data)
	{
		$pj = self::findById($data['id']);
		$array = $pj->toArray();
		$replace = self::atributeNamesReplace();
		unset($data['_token']);
		foreach ($data as $key => $value) {
			if ($key != 'id'){
				if($value < $array[$key]){
					dd($replace[$key],$value,$array[$key]);
					return ['warning'=>'Valor de '.$replace[$key].' menor al guardado'];
				}
			}
		}
		$data['fortaleza1']=$array['fortaleza1'];
		$data['fortaleza2']=$array['fortaleza2'];
		$spent = self::getSpent($data);
		if ($spent[1]>$pj->xp1){
			return ['warning'=>'No alcanza la experiencia tipo 1 para guardar'];
		}
		if ($spent[2]>$pj->xp2){
			return ['warning'=>'No alcanza la experiencia tipo 2 para guardar'];
		}
		Pj::where('id', $data['id'])->update($data);
		return ['message'=>'Pj actualizado con éxito','last'=>$data['id']];
		

	}
}
