<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chargements')) {
            Schema::create('chargements', function (Blueprint $table) {
                $table->increments('id');
                $table->string('statut', 1)->defaut('O');
                $table->integer('owner_id')->unsigned()->index();
                $table->string('depart_rue', 255);
                $table->string('depart_ville', 255);
                $table->string('depart_pays', 255);
                $table->dateTime('depart_date');
                $table->string('arrivee_rue', 255);
                $table->string('arrivee_ville', 255);
                $table->string('arrivee_pays', 255);
                $table->dateTime('arrivee_date_limite');
                $table->string('frais_transit', 50); //Aucun, A notre charge, A la charge du transporteur
                $table->integer('distance'); //km
                $table->string('type_trajet', 50);  //Aller simple, Allez/retour
                $table->string('nature_marchandise', 255);
                $table->string('type_assurance', 50); //Aucune, Marchandise
                $table->double('poids', 15, 2); //Kg
                $table->double('volume', 15, 2); //m3
                $table->string('produit_dangereux', 1)->default('N'); 
                $table->string('mode_paiement', 50); //Virement bancaire, Espèce,Lettre de change, Chèque
                $table->string('delai_paiement', 50); //A la commande, Au départ, A la livraison, Fin de mois, 30 jours fin de mois, 60 jours fin de mois, 90 jours fin de mois
                $table->string('devise', 50); //Euro, Dh, $, £
                $table->string('type_prix', 50); //Fixe, Enchères
                $table->double('prix_fixe', 15, 2)->nullable(); //Prix si type de prix fixe
                $table->string('info_complementaire', 1000)->nullable();  
                $table->nullableTimestamps();
                
                $table->foreign('owner_id')
                    ->references('id')
                    ->on('users');
            });
        };
        
        if (!Schema::hasTable('chargements_colis')) {
            Schema::create('chargements_colis', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('chargement_id')->unsigned()->index();
                $table->string('emballage', 50); //Palette,Cartons,Caisse, Sacs, Barils, Vrac liquide, Vrac solide, Cintre, Autre
                $table->integer('nombre_unite');
                $table->string('empilable', 1); //O, N
                $table->nullableTimestamps();
                
                $table->foreign('chargement_id')
                    ->references('id')
                    ->on('chargements')
                    ->onDelete('cascade');
            });
        }
        
        if (!Schema::hasTable('chargements_reponses')) {
            Schema::create('chargements_reponses', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('chargement_id')->unsigned()->index();
                $table->integer('transporteur_id')->unsigned()->index();
                $table->double('offre_financiere', 15, 2); 
                $table->string('a_propos', 1000);
                $table->timestamps();
                
                $table->foreign('chargement_id')
                    ->references('id')
                    ->on('chargements')
                    ->onDelete('cascade');
                
                $table->foreign('transporteur_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chargements_reponses');
        Schema::dropIfExists('chargements_colis');
        Schema::dropIfExists('chargements');
    }
}
