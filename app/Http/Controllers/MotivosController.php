<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class MotivosController extends Controller
{

    private $motivos;

    public function index(){
        $this->motivos = App\Motivo::all();
        return \response()->json(compact($this->motivos));
    }


}
