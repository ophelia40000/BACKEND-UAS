<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Gaun Putih',
                'price' => 300000.00,
                'quantity' => 0,
                'image' => 'http://localhost:8000/images/image3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'stripeId' => 'asdsad',
            ],
            [
                'name' => 'Baju Tidur',
                'price' => 120000.00,
                'quantity' => 0,
                'image' => 'http://localhost:8000/images/image4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'stripeId' => 'dasasdsad',
            ],
            [
                'name' => 'Baju Santai',
                'price' => 80000.00,
                'quantity' => 2,
                'image' => 'http://localhost:8000/images/image5.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'stripeId' => 'asdasd',
            ],
            [
                'name' => 'Gaun Hitam Elegan',
                'price' => 450000.00,
                'quantity' => 0,
                'image' => 'http://localhost:8000/images/image6.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'stripeId' => 'asdsad',
            ],
        ]);
    }
}
