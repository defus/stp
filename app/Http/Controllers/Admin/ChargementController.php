<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chargement;
use App\Http\Requests\CreateChargementRequest ;
use Carbon\Carbon;
use App\Http\Requests\RepondreChargementRequest;
use App\ChargementReponse;

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
        $chargement = Chargement::findOrFail($id);
        $owner = $chargement->owner();
        $reponses = $chargement->reponses()->orderby('created_at', 'desc')->get();
        $chargement_nombre = $reponses->count();
        $reponse_rescent = $chargement->reponses()->orderby('created_at', 'DESC')->first(); 
        $reponse_petit_prix = $chargement->reponses()->orderby('offre_financiere', 'ASC')->first();
        
        return view('admin.chargement.view')
            ->with('owner', $owner)
            ->with('chargement', $chargement)
            ->with('reponses', $reponses)
            ->with('chargement_nombre', $chargement_nombre)
            ->with('reponse_rescent', $reponse_rescent)
            ->with('reponse_petit_prix', $reponse_petit_prix);
    }
    
    public function repondre(Request $request, $id)
    {
        $chargement = Chargement::findOrFail($id);
        $owner = $chargement->owner();
        $reponse = $chargement->reponses()
            ->where('transporteur_id', $request->user()->id)
            ->where('chargement_id', $chargement->id)
            ->first();
        
        return view('admin.chargement.repondre', ['reponse_offre_financiere' => ($reponse != NULL) ? $reponse->offre_financiere : "", 'reponse_a_propos' => ($reponse != NULL) ?  $reponse->a_propos : ""])
            ->with('owner', $owner)
            ->with('chargement', $chargement);
    }
    
    public function doRepondre(RepondreChargementRequest $request, $id){
        $reponse = new ChargementReponse();
        $reponse->chargement_id = $id;
        $reponse->offre_financiere = $request->get('offre_financiere');
        $reponse->a_propos = $request->get('a_propos');
        $reponse->transporteur_id = $request->user()->id;
        $reponse->created_at = Carbon::now();
        $reponse->updated_at = Carbon::now();
        
        $reponse->save();
        
        return redirect('/admin/chargement')
            ->withSuccess("Votre réponse à cette demande de chargemet a été envoyée avec succès au donneur d'ordre !");
    }
    
    public function archive(Request $request){
        $user = $request->user();
        $chargements = Chargement::where('statut', 'A')->where('owner_id', $user->id)->get();
        $titre = "Mes demandes de chargement archivées";
        
        return view('admin.chargement.list')
            ->with('chargements', $chargements)
            ->with('titre', $titre);
    }
    
    public function doArchive(Request $request, $id){
        $chargement = Chargement::find($id);
        $chargement->statut = 'A';
        $chargement->save();
        
        return redirect('/admin/chargement/' . $id)
            ->withSuccess("Vous avez archivé votre demande de chargement avec succès !");
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
