<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChuyenMucSeeder extends Seeder
{
    public function run()
    {
        DB::table('chuyen_mucs')->delete();

        DB::table('chuyen_mucs')->truncate();

        DB::table('chuyen_mucs')->insert([
            [
                'ten_chuyen_muc'            => 'Áo Nam',
                'slug_chuyen_muc'           => Str::slug('Áo Nam'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Nam',
                'slug_chuyen_muc'           => Str::slug('Quần Nam'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Khoác - Áo Ấm',
                'slug_chuyen_muc'           => Str::slug('Áo Khoác - Áo Ấm'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Đôi',
                'slug_chuyen_muc'           => Str::slug('Áo Đôi'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Váy Đầm Nữ',
                'slug_chuyen_muc'           => Str::slug('Váy Đầm Nữ'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Nữ',
                'slug_chuyen_muc'           => Str::slug('Áo Nữ'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Nữ',
                'slug_chuyen_muc'           => Str::slug('Quần Nữ'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 0,
            ],
            //1
            [
                'ten_chuyen_muc'            => 'Áo Thun',
                'slug_chuyen_muc'           => Str::slug('Áo Thun'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 1,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Polo',
                'slug_chuyen_muc'           => Str::slug('Áo Polo'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 1,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Sơ Mi',
                'slug_chuyen_muc'           => Str::slug('Áo So Mi'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 1,
            ],
            //2
            [
                'ten_chuyen_muc'            => 'Quần Jean',
                'slug_chuyen_muc'           => Str::slug('Quần Jean'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 2,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Kaki',
                'slug_chuyen_muc'           => Str::slug('Quần Kaki'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 2,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Short',
                'slug_chuyen_muc'           => Str::slug('Quần Short'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 2,
            ],
            //3
            [
                'ten_chuyen_muc'            => 'Áo Khoác Gió',
                'slug_chuyen_muc'           => Str::slug('Áo Khoác Gió'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 3,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Sweater',
                'slug_chuyen_muc'           => Str::slug('Áo Sweater'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 3,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Len',
                'slug_chuyen_muc'           => Str::slug('Áo Len'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 3,
            ],
            //4
            [
                'ten_chuyen_muc'            => 'Áo Polo Đôi',
                'slug_chuyen_muc'           => Str::slug('Áo Polo Đôi'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 4,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Thun Đôi',
                'slug_chuyen_muc'           => Str::slug('Áo Thun Đôi'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 4,
            ],
            //5
            [
                'ten_chuyen_muc'            => 'Váy Thiết Kế',
                'slug_chuyen_muc'           => Str::slug('Váy Thiết Kế'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 5,
            ],
            [
                'ten_chuyen_muc'            => 'Váy 2 Dây',
                'slug_chuyen_muc'           => Str::slug('Váy 2 Dây'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 5,
            ],
            [
                'ten_chuyen_muc'            => 'Váy Polo',
                'slug_chuyen_muc'           => Str::slug('Váy Polo'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 5,
            ],
            //6
            [
                'ten_chuyen_muc'            => 'Áo Thun',
                'slug_chuyen_muc'           => Str::slug('Áo Thun'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 6,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Sơ Mi',
                'slug_chuyen_muc'           => Str::slug('Áo Sơ Mi'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 6,
            ],
            [
                'ten_chuyen_muc'            => 'Áo Kiểu',
                'slug_chuyen_muc'           => Str::slug('Áo Kiểu'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 6,
            ],
            //7
            [
                'ten_chuyen_muc'            => 'Quần Jeans',
                'slug_chuyen_muc'           => Str::slug('Quần Jeans'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 7,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Tây',
                'slug_chuyen_muc'           => Str::slug('Quần Tây'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 7,
            ],
            [
                'ten_chuyen_muc'            => 'Quần Kaki',
                'slug_chuyen_muc'           => Str::slug('Quần Kaki'),
                'tinh_trang'                => '1',
                'id_chuyen_muc_cha'         => 7,
            ],






        ]);
    }
}
