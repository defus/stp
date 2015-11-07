<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chargement;

class ChargementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $titre = "";
        
        if($user->c_type === 'O'){
            $chargements = Chargement::where('statut', 'O')->where('owner_id', $user->id)->get();
            $titre = "Mes demandes de chargements";
        }else if($user->c_type === 'T'){
            $chargements = Chargement::where('statut', 'O')->get();
            $titre = "Demandes de chargements émises par les donneurs d'ordre";
        }else{
            return redirect('/admin/user/societe')
                ->withErrors("Impossible d'afficher les chargements. Vous n'êtes pas un utilisateur de type transporteur ou donneur d'ordre. Veuillez nous contacter");
        }
        
        return view('admin.chargement.list')
            ->with('chargements', $chargements)
            ->with('titre', $titre);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chargement.create');
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
        return view('admin.chargement.view');
    }
    
    public function repondre($id)
    {
        return view('admin.chargement.repondre');
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
}
