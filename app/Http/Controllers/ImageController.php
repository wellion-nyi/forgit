<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\image;
use App\post;
use App\File;
use App\User;

class ImageController extends Controller
{
     public function __construct(){

    	$this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $forpost=post::all();
       
    		
    		return view('image.index', 'forpost');

    }


    public function store(Request $request)
    {




/*
    	$request->validate([

    		'image'=>'required|max:5000'


    	]);*/

               
         
    }



}
