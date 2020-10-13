<?php

use Illuminate\Database\Seeder;

class FieldsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            [
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'first_name',
                'label' => 'First Name',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'last_name',
                'label' => 'Last Name',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'email')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'email',
                'label' => 'Email',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'date')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'date_of_birth',
                'label' => 'Date of Birth',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'birth_number',
                'label' => 'Birth Number',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'phone')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'phone',
                'label' => 'Phone',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'address')->first('id')->id,
                'name' => 'city',
                'label' => 'City',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'address')->first('id')->id,
                'name' => 'zip',
                'label' => 'ZIP',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'street',
                'label' => 'Street',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'address')->first('id')->id,
                'name' => 'country',
                'label' => 'Country',
            ],[
                'module_id' => \App\Module::where('name', 'clients')->first('id')->id,
                'field_type_id' => \App\CFieldType::where('name', 'string')->first('id')->id,
                'field_block_id' => \App\FieldBlock::where('name', 'basic')->first('id')->id,
                'name' => 'nationality',
                'label' => 'Nationality',
            ],
        ];


        foreach($fields as $index => $field){
            $fields[$index]['updated_at'] = \Carbon\Carbon::now();
            $fields[$index]['created_at'] =  \Carbon\Carbon::now();
            $fields[$index]['sequence'] = $index+1;
        }

        DB::table('fields')->insert($fields);
    }
}
