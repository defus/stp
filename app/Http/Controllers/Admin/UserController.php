<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\UserEmailUpdateRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function profile(){
        return view('admin.user.profile');
    }
    
    public function societe(){
        return view('admin.user.societe');
    }
    
    protected function resetPassword(UserPasswordUpdateRequest $request)
    {
        $user = $request->user();
        
        if (!Auth::attempt(['email' => $user->email, 'password' => $request->get('password_old')])) {
            return redirect('/admin/user/profile')
                ->withErrors("Impossible d'effectuer la mise-à-jour du mot de passe. L'ancien mot de passe saisie n'est pas correct !");
        }
        
        $user->password = bcrypt($request->get('password'));
        $user->save();
        
        return redirect('/admin/user/profile')
            ->withSuccess("Mise-à-jour du mot de passe de l'utilisateur effectué avec succèss !");
    }
    
    protected function resetEmail(UserEmailUpdateRequest $request)
    {
        $user = $request->user();
        
        $user->email = $request->get('email');
        $user->save();
        
        return redirect('/admin/user/profile')
            ->withSuccess("Mise-à-jour de l'email de l'utilisateur effectué avec succèss !");
    }
}
