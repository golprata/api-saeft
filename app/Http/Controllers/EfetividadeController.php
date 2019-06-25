<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Efetividade;
use App\Imports\EfetividadeImport;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;


class EfetividadeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {

        $user_authenticated = JWTAuth::parseToken()->authenticate() ;

        // Array que vai alimentar a lista de efetividades
        $efetividades = DB::table('lotacao_user')
        ->join('users', 'lotacao_user.user_id', '=', 'users.id')
        ->join('efetividades', 'users.matricula', '=', 'efetividades.user_matricula')
        ->join('lotacaos', 'lotacaos.id', '=', 'lotacao_user.lotacao_id')
        ->select('users.matricula', 'users.name', DB::raw('SUM(efetividades.efetivos) as efetivos'),
        DB::raw('SUM(efetividades.baixados) baixados'),
        DB::raw('SUM(efetividades.ausentes) ausentes'),
        DB::raw('SUM(efetividades.cancelados) cancelados'),
        DB::raw('SUM(efetividades.log_irregular) log_irregular'),
        DB::raw('SUM(efetividades.mal_enderecado) mal_enderecado'))
        ->groupBy('users.name', 'users.matricula')
        ->where('lotacaos.id', '=', $user_authenticated->lotacoes->first()->id)
        ->get();

        // Array que vai alimentar a lista de efetividades
        // $efetividades = DB::select('SELECT u.matricula,
        // u.name,
        // SUM(ef.baixados) baixados,
        // SUM(ef.efetivos) efetivos,
        // SUM(ef.ausentes) ausentes,
        // SUM(ef.cancelados) cancelados,
        // SUM(ef.log_irregular) log_irregular,
        // SUM(ef.mal_enderecado) mal_enderecado from lotacao_user lu
        // INNER JOIN users u
        // INNER JOIN efetividades ef
        // INNER JOIN lotacaos l
        // WHERE lu.user_id = u.id AND u.matricula = ef.user_matricula AND l.id = lu.lotacao_id AND l.id = ?
        // GROUP BY u.NAME, u.matricula', [$user_authenticated->lotacoes->first()->id]);


        // Array com os dados acumulados para mostrar no grafico
        $total_efetividades = DB::select('SELECT
        SUM(ef.baixados) AS baixados,
        SUM(ef.efetivos) AS efetivos,
        SUM(ef.cancelados) AS cancelados,
        SUM(ef.ausentes) AS ausentes,
        SUM(ef.log_irregular) AS log_irregular,
        SUM(ef.mal_enderecado) AS mal_enderecado
        FROM lotacao_user lu
        INNER JOIN users u
        INNER JOIN lotacaos l
        INNER JOIN efetividades ef
        WHERE lu.lotacao_id = l.id
        AND u.id = lu.user_id
        AND ef.user_matricula = u.matricula
        AND l.id = '.$user_authenticated->lotacoes->first()->id);

        $total_efetividade = $total_efetividades[0];


        return response()->json(compact('efetividades', 'total_efetividade'));
    }

    public function import(Request $request)
    {
        // Funcionou assim

        if(Excel::import(new EfetividadeImport, request()->import_file)){
            return response()->json("data: {success:true}", 200);
        }
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
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
        //
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
    }
}
