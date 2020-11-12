<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\post;
use Auth;
use App\User;
use App\image;
use File;

class PostController extends Controller
{


     public function __construct(){

        $this->middleware('auth');

    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forpost=post::orderby('id', 'DESC')->get();
        return view('post.index', compact('forpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriespost=category::all();
        $post=post::all();
        return view('post.create', compact('categoriespost', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $request->validate([

                'title'=>'required|string|max:200|min:10',
                'description'=>'required|string|',
                'category_name'=>'required',
                
        ]);

        $title=$request->title;
        $description=$request->description;
        $category_id=$request->category_name;


        $post= new post;

        $post->title=$title;
        $post->description=$description;
        $post->category_id=$category_id;
        $post->user_id=Auth::user()->id;

        $post->save();




       

        $lastid=$post->id;

        if ($request->hasFile('image')) {
            $files=$request->file('image');


             foreach ($files as $file) {
            
            $name=time().'_'.$file->getClientOriginalName();
            $path=public_path('/storage/uploads/');
            $file->move($path, $name);
            
            $photo= new image;
            $photo->image=$name;
            $photo->post_id=$lastid;
            $photo->save();



                }

        }

       

        return redirect()->back()->with('success', 'successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

        $post=post::findOrFail($id);

         return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriespost=category::all();
        $post=post::findOrFail($id);

        return view('post.edit', compact('post', 'categoriespost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

                 'title'=>'required|string|max:200|min:10',
                'description'=>'required|string|',
                'category_name'=>'required'


        ]);

            $post=post::findOrFail($id);    
       
            
            $lastid=$post->id;

         if ($request->hasFile('image')) {

            $images=$request->file('image');

             foreach ($images as $image) {
            
            $name=time().'_'.$image->getClientOriginalName();          
            $path=public_path('/storage/uploads/');
            $image->move($path, $name);

            if (isset($image->image)) {

                $path=public_path('/storage/uploads/');
                $oldname=$image->image;

               File::delete($path.''.$oldname);
            }
            
            $photo= new image;
            $photo->image=$name;
            $photo->post_id=$lastid;
            $photo->save();



                }

        }


         $title=$request->title;
        $description=$request->description;
        $category_id=$request->category_name;




            

            $post->title=$title;
            $post->description=$description;
            $post->category_id=$category_id;
            $post->save();






            return redirect()->back()->with('success', 'successfully');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


            $images=image::where('post_id', $id)->get();

            

            foreach ($images as $image) {
                
                 $path=public_path('/storage/uploads/');
                 $name=$image->image;
                 File::delete($path.''.$name);

            }
       if (post::where('id', $id)->delete()) {
           
           return redirect()->back();
       }else{

            return redirect()->back();
       }

      


    }


}

