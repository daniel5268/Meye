<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pj extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function obj_ownerships()
    {
        return $this->hasMany('App\Obj_ownership');
    }
}
