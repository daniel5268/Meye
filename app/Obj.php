<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obj extends Model
{
    protected $guarded = [
        'id',
    ];

    public static function atributeInfo()
    {
    	return[
    		'standard'=>['type'=>'boolean','title'=>'Estándar?','standard'=>false],
    		'packable'=>['type'=>'boolean','title'=>'Equipable?','standard'=>false],
    		'name'=>['type'=>'string','title'=>'Nombre','standard'=>false],
    		'price'=>['type'=>'integer','title'=>'Precio','standard'=>false],
    		'damage'=>['type'=>'integer','title'=>'Daño','standard'=>true],
    		'resistence'=>['type'=>'integer','title'=>'Resistencia','standard'=>true],
    		'of_blood'=>['type'=>'integer','title'=>'Desangre','standard'=>true],
    		'cushioned'=>['type'=>'integer','title'=>'Amortiguado','standard'=>true],
    		'weight'=>['type'=>'integer','title'=>'Peso','standard'=>true],
    		'throw'=>['type'=>'integer','title'=>'Lance','standard'=>true],
    		'duration'=>['type'=>'integer','title'=>'Vida útil','standard'=>true],
    		'description'=>['type'=>'text','title'=>'Descripción'],
    	];
    }
}
