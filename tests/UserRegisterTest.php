<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegisterTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRegisterUser()
    {
        $this->post('/register')
             ->assertReponseStatus(200);
    }
}
