<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousels')->insert([
            [
                'title' => 'Gaun Merah Elegan',
                'description' => 'Gaun yang dirancang khusus untuk tampil anggun dan percaya diri. Tunjukkan pesona Anda dan melangkahlah dengan gaya yang menawan.',
                'image' => 'https://down-id.img.susercontent.com/file/adf37a80cba219252c7aad217ceb7e42',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gaun Hitam Cantik',
                'description' => 'Gaun yang memberikan kesan mewah dan elegan, cocok untuk acara formal.',
                'image' => 'https://img.lazcdn.com/g/p/041528c9cb4030d1dad1115cdb019cb5.jpg_720x720q80.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
