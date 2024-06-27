<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
        DB::table('products')->insert([
            [
                'name' => 'Gaun Putih',
                'price' => 300000,
                'quantity' => 12,
                'image' => 'images/image3.jpg',
                'stripeId' => 'price_1PWJkMBB9x53gLGuv4pyGr6s',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baju Tidur',
                'price' => 120000,
                'quantity' => 43,
                'image' => 'images/image4.jpg',
                'stripeId' => 'price_1PWJjrBB9x53gLGufL66G3X',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baju Santai',
                'price' => 80000,
                'quantity' => 150,
                'image' => 'images/image5.jpg',
                'stripeId' => 'price_1PWJiyBB9x53gLGudHxbXHK0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaun Hitam Elegan',
                'price' => 450000,
                'quantity' => 54,
                'image' => 'images/image6.jpg',
                'stripeId' => 'price_1PWJhSBB9x53gLGukl3IfX9M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blouse Lengan Panjang Putih',
                'price' => 220000,
                'quantity' => 21,
                'image' => 'images/image7.webp',
                'stripeId' => 'price_1PWKLMBB9x53gLGuJm22ZDqw',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cardigan Putih',
                'price' => 278000,
                'quantity' => 21,
                'image' => 'images/image8.webp',
                'stripeId' => 'price_1PWKM6BB9x53gLGu5Kr6yKt7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cardigan Biru',
                'price' => 260000,
                'quantity' => 21,
                'image' => 'images/image9.png',
                'stripeId' => 'price_1PWKMmBB9x53gLGuzCOQmWTZ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baju Tidur Biru',
                'price' => 150000,
                'quantity' => 21,
                'image' => 'images/image10.jpg',
                'stripeId' => 'price_1PWKO3BB9x53gLGuV4tEK0Ms',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pakaian Luar Polka Tidak Berlengan',
                'price' => 260000,
                'quantity' => 21,
                'image' => 'images/image11.jpg',
                'stripeId' => 'price_1PWKRGBB9x53gLGulBDHf1qU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemeja Flannel Biru',
                'price' => 190000,
                'quantity' => 21,
                'image' => 'images/image12.webp',
                'stripeId' => 'price_1PWKWfBB9x53gLGuWHysSNpq',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemeja Flannel Merah',
                'price' => 195000,
                'quantity' => 21,
                'image' => 'images/image13.webp',
                'stripeId' => 'price_1PWKYNBB9x53gLGuyDZdZEo2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemeja Flannel Cokelat',
                'price' => 180000,
                'quantity' => 21,
                'image' => 'images/image14.jpg',
                'stripeId' => 'price_1PWKb6BB9x53gLGuXuQ9DMoN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jaket Cokelat',
                'price' => 250000,
                'quantity' => 21,
                'image' => 'images/image15.jpg',
                'stripeId' => 'price_1PWKe1BB9x53gLGubdtzAGDT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Varsity Hitam',
                'price' => 225000,
                'quantity' => 21,
                'image' => 'images/image16.jpg',
                'stripeId' => 'price_1PWKfcBB9x53gLGuCcbTI6N3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Varsity Putih',
                'price' => 240000,
                'quantity' => 21,
                'image' => 'images/image17.jpg',
                'stripeId' => 'price_1PWKgtBB9x53gLGuVNRBi77Z',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sweater Pink',
                'price' => 160000,
                'quantity' => 21,
                'image' => 'images/image18.jpg',
                'stripeId' => 'price_1PWKigBB9x53gLGuE0vj4jzy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
