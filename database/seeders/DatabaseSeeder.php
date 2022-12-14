<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kos;

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
        for($i = 1; $i <= 50; $i++){
            // insert data ke table Kos menggunakan Faker
            Kos::create([
                'user_id' => 1,
                'namakos' => 'Kos '.$faker->firstName,
                'jumlahkamar' => $faker->numberBetween(1,15),
                'hargaperbulan' => $faker->numberBetween(150000, 500000),
                'hargapertahun' => $faker->numberBetween(4000000,10000000),
                'gambarkos' => 'Gambar Kos',
                'fasilitas' => $faker->word,
                'koskhusus' => $faker->numberBetween(1,2),
                'alamat' => $faker->address,
                'status' => 1,
            ]);
        }
    }
}
