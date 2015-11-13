<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/admin';
    protected $redirectTo = '/admin';
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'societe' => 'required|max:255',
            'rc' => 'required|max:50',
            'tel' => 'required|max:50',
            'c_type' => 'required|max:1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'societe' => $data['societe'],
            'rc' => $data['rc'],
            'tel' => $data['tel'],
            'c_type' => $data['c_type'],
            'rue' => '',
            'ville' => '',
            'pays' => '',
            'a_propos' => '',
            'logo' => 'nologo.jpg',
            'statut' => 2,
        ]);
        
        Mail::send('emails.register', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Veuillez confirmer votre adresse email');
        });
        
        return $user;
    }
}
