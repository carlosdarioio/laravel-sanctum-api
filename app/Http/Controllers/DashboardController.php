<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //funcion pa requerir auth, si no esta bloquea el acceso
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //usando hasMany
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('dashboard')->with('posts',$user->postsmodel);//<---usando la relacion hasMany!!!
    }
}
