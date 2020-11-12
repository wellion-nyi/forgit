<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\post;

class UserController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }


    public function showuser($id){

    
     
    	$user=User::findOrFail($id);
    	$posts=$user->posts;

    	return view('user.foruser', compact('posts'));

    }
}
