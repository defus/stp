<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\UserEmailUpdateRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\DesableProfileRequest;
use App\Http\Requests\UpdateSocieteRequest;
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
    
    protected $fields = [
        'name' => '',
        'tel' => '',
        'email' => '',
        'societe' => '',
        'rc' => '',
        'rue' => '',
        'ville' => '',
        'pays' => '',
        'a_propos' => '',
        'logo' => 'nologo.jpg',
        
    ];
    
    public function profile(Request $request){
        $user = $request->user();
        
        $data = [];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }
        
        return view('admin.user.profile', $data);
    }
    
    public function societe(Request $request){
        $user = $request->user();
        
        $data = [];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }
        
        return view('admin.user.societe', $data);
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
    
    protected function updateProfile(UpdateProfileRequest $request)
    {
        $user = $request->user();
        
        $user->name = $request->get('name');
        $user->tel = $request->get('tel');
        $user->save();
        
        return redirect('/admin/user/profile')
            ->withSuccess("Mise-à-jour des coordonnées effectuée avec succès !");
    }
    
    
    protected function desableProfile(DesableProfileRequest $request)
    {
        $user = $request->user();
        
        $user->statut = '0';
        $user->save();
        
        Auth::logout();
        
        return redirect('/auth/login')
            ->withSuccess("Votre compte a bien été désactivé. Si vous souhaitez le réactiver, veuillez nous contacter !");
    }
    
    protected function updateSociete(UpdateSocieteRequest $request){
        $user = $request->user();
        
        $imageName = 'logo.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path() . '/users/' . $user->id, $imageName);
        
        $user->societe = $request->get('societe');
        $user->rc = $request->get('rc');
        $user->rue = $request->get('rue');
        $user->ville = $request->get('ville');
        $user->pays = $request->get('pays');
        $user->a_propos = $request->get('a_propos');
        $user->logo = $user->id . '/' . $imageName;
        
        $user->save();
        
        return redirect('/admin/user/societe')
            ->withSuccess("Mise-à-jour des informations de la société effectuées avec succès !");
    }
}
