<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops =  Shop::factory()->count(10)->create();
    }
}
