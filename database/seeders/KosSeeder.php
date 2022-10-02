<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kos;

class KosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
            // insert data ke table Kos menggunakan Faker
            Kos::create([
                'user_id' => 1,
                'namakos' => $faker->company,
                'jumlahkamar' => $faker->numberBetween(1,15),
                'hargaperbulan' => $faker->numberBetween(150000, 500000),
                'hargapertahun' => $faker->numberBetween(4000000,10000000),
                'gambarkos' => 'Gambar Kos',
                'fasilitas' => $faker->word,
                'koskhusus' => $faker->numberBetween(1,2),
                'alamat' => $faker->address,
                'status' => 0,
            ]);
        }
    }
}
