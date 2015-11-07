<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DatabaseMigrationsRefresh;
use App\User;

class ChargementTransporteurTest extends TestCase
{
    use DatabaseMigrationsRefresh;
    use DatabaseTransactions;
    
    public function testAfficherListeChargements()
    {
        $donneurOrdre = User::where('societe', 'FILER')->firstOrFail();
        $transporteur = User::where('societe', 'CTM')->firstOrFail();
        
        $this->actingAs($transporteur)
            ->visit('/admin/chargement')
            ->seePageIs('/admin/chargement')
            ->see("Demandes de chargements émises par les donneurs d'ordre")
            ->see($donneurOrdre->societe)
            ->see("/users/" . $donneurOrdre->logo);
    }
}
