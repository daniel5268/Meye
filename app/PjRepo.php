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
}
