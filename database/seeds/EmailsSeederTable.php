<?php

use Faker\Generator;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmailsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Email');

        for($i=0; $i < 100; $i++) {
            DB::table('emails')->insert([
                'from' => $faker->email(),
                'to' => $this->getEmail($faker, true),
                'cc' => $this->getEmail($faker),
                'bcc' => $this->getEmail($faker),
                'subject' => $faker->text(),
                'message' => $faker->text(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }


    public function getEmail(Generator $faker, $atLeastOne=false){
        $number = random_int(1,4);
        $emails = [];
        $i = ($atLeastOne)? 0 : 1;

        for ($i; $i < $number; $i++){
            $emails[] = $faker->email();
        }
        return json_encode($emails);
    }
}
