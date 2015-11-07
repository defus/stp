<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DatabaseMigrationsRefresh;
use App\User;

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
}
