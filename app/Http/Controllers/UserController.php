<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRepo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function passwordUpdateForm()
    {
    	return view('update_password');
    }
    public function passwordUpdate(Request $request)
    {
    	$validatedData = $request->validate([
	        'current_password' => ['required',function ($attribute, $value, $fail) {
		            if (!UserRepo::validatePassword($value)) {
		                $fail('Contraseña incorrecta');
		            }
		        }],
	    	'new_password' => 'required|min:6|confirmed'
    	]);
    	$id = Auth::user()->id;
    	$password = $request->input('new_password');
    	
    	UserRepo::changePassword($id,$password);
    	return redirect()->route('home')->with('message','Contraseña actualizada');
    	
    }
}
