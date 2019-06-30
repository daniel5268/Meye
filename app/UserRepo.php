<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRepo extends Model
{
    public static function users()
	{
		return User::query()->where('type','!=','admin')->get();
	}

    public static function inited(){
    	return  !is_null(User::query()->where('type','=','admin')->first());
    }

    public static function init(){
    	self::create('admin','admin','admin');
    	self::create('master','master','master');
    }

    public static function create($username,$password,$type)
	{
		$entitie = new User;
		$entitie->username = $username;
		$entitie->password = Hash::make($password);
		$entitie->type = $type;
		$entitie->save();
	}

	public static function findByUsername($username)
	{
		return User::query()->where('username','=',$username)->first();
	}

	public static function findById($id)
	{
		return User::query()->where('id','=',$id)->first();
	}

	public static function changePassword($id, $password){
		$user = self::findById($id);
		$user->password = Hash::make($password);
		$user->save();
	}

	public static function validatePassword($password)
	{
		return Hash::check($password,Auth::user()->password);
	}
	
	public static function validateCredentials($username,$password)
	{
		dd($username);
		$hash = self::findByUsername($username)->password;
		return Hash::check($password,$hash);
	}
}
