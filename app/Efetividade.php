<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efetividade extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_matricula', 'matricula');
    }

    protected $fillable = [
        'user_matricula', 'baixados', 'efetivos', 'ausentes', 'cancelados', 'log_irregular', 'mal_enderecado'
    ];


}

