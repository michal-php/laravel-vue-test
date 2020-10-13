<?php

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
         $this->call([
             ClientsSeederTable::class,
             UsersSeederTable::class,
             ModulesSeederTable::class,
             CFieldTypesSeederTable::class,
             FieldBlocksSeederTable::class,
             FieldsSeederTable::class,

         ]);
    }
}
