<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//php artisan make:controller PagesController
class PagesController extends Controller
{
    //
    public function index(){
        $title='Welcome ot laravel papada ';
        //pasando valor
        //return view('pages.index',compact('title')); 
        return view('pages.index')->with('title',$title); 
    }

    public function about(){
        $title='About Us ';
        return view('pages.about')->with('title',$title); 
    }

    public function services(){
        //pasando array
        $data=array(
            'title'=>'Services',
            'services'=>['Web Design','Programmyng','SEO']
        );
        return view('pages.service')->with($data); 
    }
}
