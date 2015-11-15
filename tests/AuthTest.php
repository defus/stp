<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DatabaseMigrationsRefresh;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseMigrationsRefresh;
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
            ->type('T', 'c_type')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("Enregistrer")
            ->seePageIs('/admin/chargement')
            ->see("Votre email n'est pas encore confirmé ! <br/>Veuillez confirmer votre email en répondant au message que nous avons envoyé sur votre boîte email.");
        
        $this->seeInDatabase('users', ['email' => 'defolandry@yahoo.fr', 
            'name' => 'Landry DEFO',
            'societe' => 'LIMC',
            'rc' => 'rc_1',
            'tel' => '00212876564',
            'c_type' => 'T',
            'confirmed' => '0',
            ]);
        
        $user = User::whereEmail('defolandry@yahoo.fr')->first();
        if(strlen($user->confirmation_code) != 30){
            $thi->fail("Le code de validation doit avoir 30 caractères");
        }
    }
    
    public function testLoginOk()
    {
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
            ->type('T', 'c_type')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("Enregistrer")
            ->seePageIs('/auth/register');
    }
    
    public function testConfirmationOk(){
        $this->visit('/auth/register')
            ->type('Landry DEFO', 'name')
            ->type('LIMC', 'societe')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->type('rc_1', 'rc')
            ->type('00212876564', 'tel')
            ->type('T', 'c_type')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("Enregistrer")
            ->seePageIs('/admin/chargement');
        
        $user = User::whereEmail('defolandry@yahoo.fr')->first();
        
        $confirmation_code = $user->confirmation_code;
        $this->visit('/auth/confirmation/' . $confirmation_code)
            ->seePageIs('/auth/login')
            ->see("Vous avez validé votre compte avec succès !");
        
        $this->seeInDatabase('users', ['email' => 'defolandry@yahoo.fr', 
            'confirmed' => 1,
            'confirmation_code' => null,
            ]);
    }
    
}
