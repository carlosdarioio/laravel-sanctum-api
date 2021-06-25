<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\PostModel;
use Illuminate\Http\Request;

use DB;

//php artisan make:controller PostController --resource

    //condiciones por default
    //index
    //create
    //store
    //edit
    //update
    //show
    //destroy

    //ver lista de rutas
    //php artisan route:list

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //funcion pa requerir auth, si no esta bloquea el acceso
    public function __construct()
    {

        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //orderBy('title','asc') example
        //$posts= PostModel::orderBy('title','desc')->get();
        
        //pagination example
        $posts= PostModel::orderBy('created_at','desc')->paginate(10);
        //take example
        //$posts= PostModel::orderBy('title','desc')->take(1)->get();
        //all example
        //$posts=Post::all();
        //where example
        //$post=  PostModel::where('title','Post Two')->get();
        //usando DB
        //$posts=DB::select('SELECT * FROM post_models');
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // s einstalo el composer require laravelcollective/html
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //usando validation 
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        //Handle File Upload ( sai cover_image tiene imagen)
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the Image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        }else{
            $filenameToStore='noimage.jpg';
        }

        //Create post
        $post = new PostModel;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;//alola obtendiendo el user id
        $post->cover_image=$filenameToStore;
        $post->save();
        //redirect
        return redirect('/posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return PostModel::find($id);
        $post = PostModel::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = PostModel::find($id);

        //Check for correct user alola
        if(auth()->user()->id!=$post->user_id){
            return redirect('/posts')->with('error','No autorizado page');
        }


        return view('posts.edit')->with('post',$post);

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
         //usando validation 
         $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        //Handle File Upload ( sai cover_image tiene imagen)
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the Image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        }

        //Create post
        $post = PostModel::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image=$filenameToStore;
        }
        $post->save();
        //redirect
        return redirect('/posts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=PostModel::find($id);
        //Check for correct user alola
        if(auth()->user()->id!=$post->user_id){
            return redirect('/posts')->with('error','No autorizado page');
        }

        if($post->cover_image!='noimage.jpg'){
            //Delete the Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success','Post Remove');
    }
}
