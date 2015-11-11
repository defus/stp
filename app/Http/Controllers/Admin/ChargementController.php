<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chargement;
use App\Http\Requests\CreateChargementRequest ;
use Carbon\Carbon;

class ChargementController extends Controller
{
    protected $fields = [
        'statut' => 'O',
        'depart_rue' => '',
        'depart_ville' => '',
        'depart_pays' => '',
        //'depart_date' => '',
        //'depart_heure' => '',
        'arrivee_rue' => '',
        'arrivee_ville' => '',
        'arrivee_pays' => '',
        //'arrivee_date_limite' => '',
        //'arrivee_heure_limite' => '',
        'frais_transit' => '',
        'distance' => '',
        'type_trajet' => '',
        'nature_marchandise' => '',
        'type_assurance' => '',
        'poids' => '',
        'volume' => '',
        'produit_dangereux' => '',
        'mode_paiement' => '',
        'delai_paiement' => '',
        'devise' => '',
        'type_prix' => '',
        'prix_fixe' => '',
        'info_complementaire'=> ''];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $titre = "";
        
        if($user->isDonneurOrdre()){
            $chargements = Chargement::where('statut', 'O')->where('owner_id', $user->id)->get();
            $titre = "Mes demandes de chargements";
        }else if($user->isTransporteur()){
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
    public function store(CreateChargementRequest $request)
    {
        $chargement = new Chargement();
        
        foreach (array_keys($this->fields) as $field) {
            $chargement->$field = $request->get($field);
        }
        
        $chargement->owner_id = $request->user()->id;
        $chargement->statut = 'O';
        $chargement->depart_date = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('depart_date') . ' ' . $request->get('depart_heure'));
        $chargement->arrivee_date_limite = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('arrivee_date_limite') . ' ' . $request->get('arrivee_heure_limite'));
        
        $chargement->save();
        
        return response()->json(['id' => $chargement->id, 'created' => true]);
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
