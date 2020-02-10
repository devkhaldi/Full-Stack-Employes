<?php

use App\Departement;
use App\Employe;
use App\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Departement::class, 5)->create();
        factory(Job::class, 10)->create();
        factory(Employe::class, 50)->create();
    }
}
