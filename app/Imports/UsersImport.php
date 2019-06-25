<?php

namespace App\Imports;

use App\User;
use App\Motivo;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new User([
        //     'matricula'    => $row[0],
        //     'name'     => $row[1],
        //     'email' => $row[0]."@correios.com.br",
        //     'password' => bcrypt($row[0]),

        //  ]);

        $user_authenticated = JWTAuth::parseToken()->authenticate() ;

        $user = User::create([
            'matricula'    => $row[0],
            'name'     => $row[1],
            'email' => $row[0]."@correios.com.br",
            'password' => bcrypt($row[0]),

            ]);

            $user->lotacoes()->attach($user_authenticated->lotacoes->first()->id);

    }
}
