<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'samsung 128G A37',
            'description' => 'nice mobile',
            'img' => 'x1.jpg',
            'category_id' => 1
        ]);
    }
}
