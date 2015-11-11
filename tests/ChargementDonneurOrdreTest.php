<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DatabaseMigrationsRefresh;
use App\User;
use App\Chargement;
use Carbon\Carbon;

class ChargementDonneurOrdreTest extends TestCase
{
    use DatabaseMigrationsRefresh;
    use DatabaseTransactions;
    
    public function testAfficherListeChargements()
    {
        $donneurOrdre = User::where('societe', 'FILER')->firstOrFail();
        
        $this->actingAs($donneurOrdre)
            ->visit('/admin/chargement')
            ->seePageIs('/admin/chargement')
            ->see("Mes demandes de chargements");
    }
    
    public function testAfficherChargement(){
        $donneurOrdre = User::where('societe', 'FILER')->firstOrFail();
        
        $this->actingAs($donneurOrdre)
            ->visit('/admin/chargement/2')
            ->see("Consultation des réponses à la demande de chargement");
    }
    
    public function testAjouterChargement(){
        
        $donneurOrdre = User::where('societe', 'FILER')->firstOrFail();
        
        $this->actingAs($donneurOrdre)
            ->visit('/admin/chargement/create');
        
        $depart_date = Carbon::now();
        $arrivee_date = Carbon::now()->addDays(10);
        
        $data = ['_token' => csrf_token(),
            'depart_rue' => '1 bd hassan 2',
            'depart_ville' => 'Rabat',
             'depart_pays' => 'Maroc',
            'depart_date' => $depart_date->format('d/m/Y'),
            'depart_heure' => $depart_date->format('H:i:s'),
            'arrivee_rue' => '1 bd roudani',
            'arrivee_ville' => 'Rabat',
            'arrivee_pays' => 'Maroc',
            'arrivee_date_limite' => $arrivee_date->format('d/m/Y'),
            'arrivee_heure_limite' => $arrivee_date->format('H:i:s'),
            'frais_transit' => 'Aucun',
            'distance' => '100',
            'type_trajet' => 'Aller simple',
            'nature_marchandise' => 'Banane',
            'type_assurance' => 'Marchandise',
            'poids' => '1298.90',
            'volume' => '890.89',
            'produit_dangereux' => 'N',
            'mode_paiement' => 'Espèce',
            'delai_paiement' => 'Au départ',
            'devise' => 'Euro',
            'type_prix' => 'Fixe',
            'prix_fixe' => '1290.09',
            'info_complementaire'=> "Bien prendre soin de la cargaison s'il vou plait !"];
            
        $this->actingAs($donneurOrdre)
            ->post('/admin/chargement', $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->seeJson(['created' => true, 'id' => 5]);
        
        $this->seeInDatabase('chargements', ['id' => 5, 'depart_date' => $depart_date->format('Y-m-d H:i:s'), 'arrivee_date_limite' => $arrivee_date->format('Y-m-d H:i:s'), 'owner_id' => $donneurOrdre->id, 'statut' => 'O']);
            
    }
}
