<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obj_ownership extends Model
{
    protected $guarded = [
        'id',
    ];
    public function obj()
    {
        return $this->belongsTo('App\Obj');
    }

}
