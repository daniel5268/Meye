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
    		'price'=>['type'=>'integer','title'=>'Precio','standard'=>false,'max'=>'1000000000'],
    		'damage'=>['type'=>'integer','title'=>'Daño','standard'=>true,'max'=>'1000'],
    		'resistence'=>['type'=>'integer','title'=>'Resistencia','standard'=>true,'max'=>'1000'],
    		'of_blood'=>['type'=>'integer','title'=>'Desangre','standard'=>true,'max'=>'1000'],
    		'cushioned'=>['type'=>'integer','title'=>'Amortiguado','standard'=>true,'max'=>'1000'],
    		'weight'=>['type'=>'integer','title'=>'Peso','standard'=>true,'max'=>'10000'],
    		'throw'=>['type'=>'integer','title'=>'Lance','standard'=>true,'max'=>'1000'],
    		'duration'=>['type'=>'integer','title'=>'Vida útil','standard'=>true,'max'=>'1000'],
    		'description'=>['type'=>'text','title'=>'Descripción'],
    	];
    }

    public function obj_ownerships()
    {
        return $this->hasMany('App\Obj_ownership');
    }
}
