<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    
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
    
    public function testLoginOk()
    {
        $this->seed();
        $this->visit('/auth/login')
            ->type('testtest', 'password')
            ->type('test@test.com', 'email')
            ->press("Connexion")
            ->seePageIs('/admin/chargement');
    }
    
    public function testRegisterSocieteNok(){
        $this->visit('/auth/register')
            ->type('Landry DEFO', 'name')
            ->type('123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789AA123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789AA123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789AA', 'societe')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->type('rc_1', 'rc')
            ->type('00212876564', 'tel')
            ->type('M', 'gender')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("Enregistrer")
            ->seePageIs('/auth/register');
    }
}
