<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRepo;

class BossController extends Controller
{
   public function init(){
        if (is_null(UserRepo::findByUsername('admin'))){
            UserRepo::create('admin','admin','admin');
            UserRepo::create('master','master','master');
            return redirect()->route('login')->with('message','Asistente inicializado correctamente');  
        }
        return redirect()->route('login')->with('warning','El asistente ya ha sido inicializado');  
    }
    public function passwordResetForm()
    {
    	$users = UserRepo::users();
    	$data=[];
		foreach ($users as $user){
			$data[$user->id] = $user->username;
		}
    	return view('passwordResetForm')->with('users',$data);
    }
    public function passwordReset(Request $request)
    {
    	$id = $request->input('id');
    	UserRepo::changePassword($id,"newpassword");
    	return redirect()->route('home')->with('message','La contraseña fue restablecida con éxito');  
    }
}
