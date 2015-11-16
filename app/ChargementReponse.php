<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargementReponse extends Model
{
    protected $table = 'chargements_reponses';
    
    public function chargement(){
        return $this->hasOne('App\Chargement', 'id', 'chargement_id');
    }
    
    public function transporteur(){
        return $this->hasOne('App\User', 'id', 'transporteur_id');
    }
}
