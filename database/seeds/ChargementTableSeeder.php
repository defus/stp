<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChargementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('chargements')->insert([
            ['statut' => 'O', 'owner_id' => "1", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
            ['statut' => 'O', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
            ['statut' => 'O', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
            ['statut' => 'A', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('chargements_colis')->insert([
            ['chargement_id' => 1, 'emballage' => 'Palette', 'nombre_unite' => 10, 'empilable' => 'O'],
            ['chargement_id' => 1, 'emballage' => 'Cartons', 'nombre_unite' => 20, 'empilable' => 'N'],
            
            ['chargement_id' => 2, 'emballage' => 'Palette', 'nombre_unite' => 10, 'empilable' => 'O'],
            ['chargement_id' => 2, 'emballage' => 'Cartons', 'nombre_unite' => 20, 'empilable' => 'N'],
            
            ['chargement_id' => 3, 'emballage' => 'Palette', 'nombre_unite' => 10, 'empilable' => 'O'],
            ['chargement_id' => 3, 'emballage' => 'Cartons', 'nombre_unite' => 20, 'empilable' => 'N'],
            
            ['chargement_id' => 4, 'emballage' => 'Palette', 'nombre_unite' => 10, 'empilable' => 'O'],
            ['chargement_id' => 4, 'emballage' => 'Cartons', 'nombre_unite' => 20, 'empilable' => 'N'],
        ]);
        
        DB::table('chargements_reponses')->insert([
            ['chargement_id' => 1, 'statut' => 'O', 'offre_financiere' => '1234.89', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            ['chargement_id' => 1, 'statut' => 'A', 'offre_financiere' => '100000', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            
            ['chargement_id' => 2, 'statut' => 'O', 'offre_financiere' => '0.78', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            ['chargement_id' => 2, 'statut' => 'A', 'offre_financiere' => '123', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            
            ['chargement_id' => 3, 'statut' => 'O', 'offre_financiere' => '2896', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            ['chargement_id' => 3, 'statut' => 'A', 'offre_financiere' => '1900', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            
            ['chargement_id' => 4, 'statut' => 'O', 'offre_financiere' => '200.76', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
            ['chargement_id' => 4, 'statut' => 'A', 'offre_financiere' => '239', 'a_propos' => "C'est ok ?", 'transporteur_id' => '2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ],
        ]);
    }
}
