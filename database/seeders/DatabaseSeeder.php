<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create('id_ID');
        for($i=1;$i<=2;$i++){
            DB::table('wargas')->insert([
                'nik'=>$faker->numberBetween(1234567890,934567890),
                'nama'=>$faker->name(),
                'lahir'=>$faker->date(),
                'alamat'=>$faker->address(),
            ]);
        }
    }
}
