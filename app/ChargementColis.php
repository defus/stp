<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargementColis extends Model
{
    protected $table = 'chargements_colis';
    
    public function chargement(){
        return $this->belongsTo('App\Chargement', 'id', 'chargement_id');
    }
}
