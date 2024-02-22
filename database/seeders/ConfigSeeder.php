<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        DB::table('configs')->delete();

        DB::table('configs')->truncate();

        DB::table('configs')->insert([
            [
                'list_image'    =>  'https://spreethemesprevious.github.io/bisum/html/assets/img/slideshow/s1.jpg,https://spreethemesprevious.github.io/bisum/html/assets/img/slideshow/s2.jpg,https://spreethemesprevious.github.io/bisum/html/assets/img/slideshow/s3.jpg',
                'list_title'    =>  'TIEU DE 01||I LOVE YOU OKE',
                'list_des'      =>  'Look for your inspiration here|Tui là thằng thứ 2 nghen bạn|Tui cũng rứa',
                'list_link'     =>  '/san-pham/ao-dai|https://google.com|/admin/login',
            ]
        ]);
    }
}
