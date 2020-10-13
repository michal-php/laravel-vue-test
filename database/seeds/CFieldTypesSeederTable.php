<?php

use Illuminate\Database\Seeder;

class CFieldTypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
                ['name' => 'attachment'],
                ['name' => 'checkbox'],
                ['name' => 'date'],
                ['name' => 'email'],
                ['name' => 'number'],
                ['name' => 'password'],
                ['name' => 'phone'],
                ['name' => 'select'],
                ['name' => 'string'],
                ['name' => 'text'],
                //['name' => ''],
            ];

        $types =  array_map(function ($array){
            $array['updated_at'] = \Carbon\Carbon::now();
            $array['created_at'] =  \Carbon\Carbon::now();
            return $array;
        }, $types);

        DB::table('c_field_types')->insert($types);
    }
}
