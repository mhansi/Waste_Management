<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Buy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy()
    {
        $buys =Buy::all();
        return view('buy',['posts'=>$buys]);
    }
    public function collect()
    {
        $posts = Post::all();
        return view('collect', ['posts' => $posts]);
    }
    public function index()
    {

        return view('home');
    }
   
   
}
