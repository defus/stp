<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DatabaseMigrationsRefresh;

class UserTest extends TestCase
{
    use DatabaseMigrationsRefresh;
    use DatabaseTransactions;

    /**
     * Changement du mot de passe et reconnection avec le nouveau mot de passe ok
     *
     * @return void
     */
    public function testResetPasswordOk()
    {
         $user = factory(App\User::class)->create();
         
         $this->actingAs($user)
            ->visit('/admin/user/profile')
            ->type('testtest', 'password_old')
            ->type('testtest1', 'password')
            ->type('testtest1', 'password_confirmation')
            ->press("ResetPassword")
            ->seePageIs('/admin/user/profile')
            ->see("Mise-à-jour du mot de passe de l'utilisateur effectué avec succèss !");
        
        $this->visit('/auth/logout')
            ->seePageIs('/');
        
        $this->visit('/auth/login')
            ->type($user->email, 'email')
            ->type('testtest1', 'password')
            ->press("Connexion")
            ->seePageIs('/admin/chargement');
    }
    
    public function testResetPasswordKoOldPasswordIncorrect()
    {
        $user = factory(App\User::class)->create();
         
         $this->actingAs($user)
            ->visit('/admin/user/profile')
            ->type('testtest1', 'password_old')
            ->type('testtest1', 'password')
            ->type('testtest1', 'password_confirmation')
            ->press("ResetPassword")
            ->seePageIs('/admin/user/profile')
            ->see("Impossible d'effectuer la mise-à-jour du mot de passe. L'ancien mot de passe saisie n'est pas correct !");
    }
    
    public function testResetEmailOk()
    {
        $user = factory(App\User::class)->create();
         
         $this->actingAs($user)
            ->visit('/admin/user/profile')
            ->type('defolandry@yahoo.fr', 'email')
            ->press("ResetEmail")
            ->seePageIs('/admin/user/profile')
            ->see("Mise-à-jour de l'email de l'utilisateur effectué avec succèss !");
            
        $this->seeInDatabase('users', ['email' => 'defolandry@yahoo.fr']);
    }
    
    public function testChangeProfileOk()
    {
        $user = factory(App\User::class)->create();
        
        $this->actingAs($user)
            ->visit('/admin/user/profile')
            ->type('Landry DEFO KUATE', 'name')
            ->type('00212345678', 'tel')
            ->press("UpdateProfile")
            ->seePageIs('/admin/user/profile')
            ->see("Mise-à-jour des coordonnées effectuée avec succès !");
        
        $this->seeInDatabase("users", ['email' => $user->email, 'name' => 'Landry DEFO KUATE', 'tel' => '00212345678']);
    }
    
    public function testDesactiverProfileOk()
    {
        $user = factory(App\User::class)->create();
        
        $this->actingAs($user)
            ->visit('/admin/user/profile')
            ->press("DesableProfile")
            ->seePageIs('/auth/login')
            ->see("Votre compte a bien été désactivé. Si vous souhaitez le réactiver, veuillez nous contacter !");
        
        $this->seeInDatabase("users", ['email' => $user->email, 'statut' => '0']);
        
        $this->visit('/auth/login')
            ->type('testtest', 'password')
            ->type('test@test.com', 'email')
            ->press("Connexion");
            //->seePageIs('/auth/login')
            //->see("Impossble de se connecter car vous avez désactivé votre compte. Veuillez nous contacter pour activer votre compte à nouveau !");
    }
}