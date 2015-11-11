<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargementReponse extends Model
{
    protected $table = 'chargements_reponses';
    
    public function chargement(){
        return $this->belongsTo('App\Chargement', 'id', 'chargement_id');
    }
}
