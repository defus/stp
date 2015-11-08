<?php

use Illuminate\Database\Seeder;

class ChargementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('chargements')->insert([
            ['statut' => 'O', 'owner_id' => "1", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir"],
            
            ['statut' => 'O', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir"],
            
            ['statut' => 'O', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir"],
            
            ['statut' => 'A', 'owner_id' => "3", 'depart_rue' => '1 av ibn sina', 'depart_ville' =>'Rabat', 'depart_pays' => 'Maroc', 'depart_date' => '2016-11-15 10:00:00', 'arrivee_rue' => '78 Av Palmiers', 'arrivee_ville' => 'Agadir', 'arrivee_pays' => 'Maroc', 'arrivee_date_limite' => '2016-11-30 18:00:00', 'frais_transit' => 'A notre charge', 'distance' => 800, 'type_trajet' => 'Aller simple', 'nature_marchandise' => 'Fils de fers', 'type_assurance' => 'Aucune', 'poids' => '1200.23', 'volume' => '200', 'produit_dangereux' => 'N', 'mode_paiement' => 'Virement bancaire', 'delai_paiement' => 'A la commande', 'devise' => 'Dh', 'type_prix' => 'Fixe', 'prix_fixe' => '21200.90', 'info_complementaire' => "Transporteur sérieux recherché !\nAmateurs s'abstenir"],
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
    }
}
