<?php

namespace App\Imports;

use App\Efetividade;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class EfetividadeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        if(User::where('matricula', $row[0])->first()){

            return new Efetividade([
                'user_matricula'    => $row[0],
                'baixados'          => $row[7],
                'efetivos'          => $row[2],
                'ausentes'          => $row[4],
                'cancelados'        => $row[6],
                'log_irregular'     => $row[5],
                'mal_enderecado'    => $row[3]

                ]);

            }
            else{
                $authenticated_user = JWTAuth::parseToken()->authenticate() ;
                $user = User::create([
                    'matricula'    => $row[0],
                    'name'     => $row[1],
                    'email' => $row[0]."@correios.com.br",
                    'password' => bcrypt($row[0]),

                    ]);

                    // adiciona o relacionamento LotacaoUser
                    $user->lotacoes()->attach($authenticated_user->lotacoes->first()->id);

                    return new Efetividade([
                        'user_matricula'    => $row[0],
                        'baixados'          => $row[7],
                        'efetivos'          => $row[2],
                        'ausentes'          => $row[4],
                        'cancelados'        => $row[6],
                        'log_irregular'     => $row[5],
                        'mal_enderecado'    => $row[3]

                        ]);

                    }

                }
            }
