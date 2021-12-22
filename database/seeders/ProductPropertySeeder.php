<?php

namespace Database\Seeders;

use App\Models\ProductProperty;
use Illuminate\Database\Seeder;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductProperty::create([
            'name' => 'capacity',
            'value' => '128G',
            'price' => 5000000,
            'stock' => 10,
            'product_id' => 1
        ]);
        ProductProperty::create([
            'name' => 'capacity',
            'value' => '256G',
            'price' => 5500000,
            'stock' => 5,
            'product_id' => 1
        ]);
    }
}
