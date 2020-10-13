<?php

use Illuminate\Database\Seeder;
use App\Module;

class FieldBlocksSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blocks = [
           [
               'name' => 'basic',
               'label' => 'Basic',
               'sequence' => 1,
               'module_id' => Module::where('name', 'clients')->first('id')->id
           ], [
               'name' => 'address',
               'label' => 'Address',
               'sequence' => 2,
               'module_id' => Module::where('name', 'clients')->first('id')->id
           ],
        ];


        $blocks =  array_map(function ($array){
            $array['updated_at'] = \Carbon\Carbon::now();
            $array['created_at'] =  \Carbon\Carbon::now();
            return $array;
        }, $blocks);


        DB::table('field_blocks')->insert($blocks);
    }
}
