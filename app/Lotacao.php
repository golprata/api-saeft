<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lotacao extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\LotacaoUser');
    }

    // public function efetividades()
    // {
    //     return $this->belongsToMany('App\Efetividade');//->using('App\LotacaoUser');
    // }
}
