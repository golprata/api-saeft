<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PainelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index(){
    $user = Auth()->User();
    return view('painel.index', compact('user'));
   }

}
