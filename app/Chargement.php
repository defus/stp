<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chargement extends Model
{
    protected $table = 'chargements';
    
    public function owner(){
        return $this->hasOne('App\User', 'id', 'owner_id');
    }
    
}
