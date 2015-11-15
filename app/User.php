<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    const TRANSPORTEUR = "transporteur";
    const DONNEUR_ORDRE = "donneur_ordre";
    const ADMIN = "admin";
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'societe', 'rc', 'tel', 'c_type', 'rue', 'ville', 'pays','a_propos', 'logo', 'confirmation_code', 'validated'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function getLogoAttribute($value){
        if($value === NULL){
            return "nologo.jpg";
        }
        return $value;
    }
    
    public function getType(){
        if($this->isTransporteur()){
            return 'Transporteur';
        }else if($this->isDonneurOrdre()){
            return "Donneur d'ordre";
        }
        return '';
    }
    
    public function isDonneurOrdre(){
        return $this->c_type === 'O';
    }
    
    public function isTransporteur(){
        return $this->c_type === 'T';
    }
    
    public function isAdmin(){
        return false;
    }
}
