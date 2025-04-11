<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Mixed Nuts Coffee',
                'description' => 'A astounding mix of high quality coffee, almond nuts, and other herbs',
                'price' => 450.75,
                'status' => 0
            ],
            [
                'name' => 'Barley Fine Wine',
                'description' => 'A beautiful blend of barley into a sophisticated wine.',
                'price' => 1450.80,
                'status' => 0,
            ]
        ];

        foreach($products as $prod) Product::create($prod);
    }
}
