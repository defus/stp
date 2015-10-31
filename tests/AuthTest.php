<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterOk()
    {
        $this->visit('/auth/register')
            ->type('Landry DEFO', 'name')
            ->type('LIMC', 'societe')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->type('rc_1', 'rc')
            ->type('00212876564', 'tel')
            ->type('M', 'gender')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("Enregistrer")
            ->seePageIs('/admin/chargement');
        
        $this->seeInDatabase('users', ['email' => 'defolandry@yahoo.fr', 
            'name' => 'Landry DEFO',
            'societe' => 'LIMC',
            'rc' => 'rc_1',
            'tel' => '00212876564',
            'gender' => 'M'
            ]);
    }
}
