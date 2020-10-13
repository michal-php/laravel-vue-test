<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, 100)->create();
    }
}
