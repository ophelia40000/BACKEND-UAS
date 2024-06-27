<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            'title' => 'Gaun Merah Elegan',
            'description' => 'Gaun yang dirancang khusus untuk tampil anggun dan percaya diri. Tunjukkan pesona Anda dan melangkahlah dengan gaya yang menawan.',
            'image' => 'https://example.com/path/to/image1.png'
        ]);

        Carousel::create([
            'title' => 'Gaun Biru Cantik',
            'description' => 'Gaun yang memberikan kesan mewah dan elegan, cocok untuk acara formal.',
            'image' => 'https://example.com/path/to/image2.png'
        ]);
    }
}
