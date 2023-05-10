<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween($min = 150, $max = 500),
                'quantity' => $faker->numberBetween($min = 150, $max = 300),
            ]);
        }
    }
}
