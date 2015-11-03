<?php
namespace App;

trait DatabaseMigrationsRefresh
{
    /**
     * @before
     */
    public function runDatabaseMigrationsRefresh()
    {
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }
}