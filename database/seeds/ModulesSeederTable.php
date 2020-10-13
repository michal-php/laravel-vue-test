<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['name' => 'clients', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'emails', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
        ];

        DB::table('modules')->insert($modules);
    }
}
