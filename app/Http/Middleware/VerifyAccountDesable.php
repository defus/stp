<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class VerifyAccountDesable
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            $user = Auth::user();
            if($user->statut == '0'){
                $this->auth->logout();
                return redirect('/auth/login')
                    ->withErrors("Impossble de se connecter car vous avez désactivé votre compte. Veuillez nous contacter pour activer votre compte à nouveau !");
            }
        }

        return $next($request);
    }
}
