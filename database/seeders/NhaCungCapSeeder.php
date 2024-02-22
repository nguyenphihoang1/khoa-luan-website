<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nha_cung_caps')->delete();

        DB::table('nha_cung_caps')->truncate();

        DB::table('nha_cung_caps')->insert([
            [
                'ma_so_thue'            => '0300588569',
                'ten_cong_ty'           => 'CÔNG TY TNHH SƠN TÙNG',
                'ten_nguoi_dai_dien'    => 'Ông Phan Minh Tiến',
                'so_dien_thoai'         => 0123123123,
                'email'                 => 'info@sontungjeans.com',
                'dia_chi'               => '39/5 Hoàng Dư Khương, Phường 12, Q. 10, Tp. Hồ Chí Minh (TPHCM)',
                'ten_goi_nho'           => 'Ông Tiến',
            ],
            [
                'ma_so_thue'            => '0151323569',
                'ten_cong_ty'           => 'CÔNG TY TNHH PHÁT THIÊN THANH',
                'ten_nguoi_dai_dien'    => 'Ms. Cao Thị Cẩm',
                'so_dien_thoai'         =>  0123123123,
                'email'                 => 'phatthienthanh@gmail.com',
                'dia_chi'               => 'Thửa đất số 615, tờ bản đồ số 39, Khu phố Khánh Lộc, P.Khánh Bình, Tx Tân Uyên, Tỉnh Bình Dương',
                'ten_goi_nho'           => 'Cao Thị Cẩm',
            ],
            [
                'ma_so_thue'            => '0321288123',
                'ten_cong_ty'           => 'CÔNG TY TNHH ANMAC VIỆT NAM',
                'ten_nguoi_dai_dien'    => 'Nguyễn Văn ANMAC',
                'so_dien_thoai'         =>  0123123123,
                'email'                 => 'anmac.vn@gmail.com',
                'dia_chi'               => 'Tòa Nhà 19, N7B, Trung Hòa, Nhân Chính, Quận Thanh Xuân, TP Hà Nội (TPHN)',
                'ten_goi_nho'           => 'ANMAC',
            ],
            [
                'ma_so_thue'            => '01231288123',
                'ten_cong_ty'           => 'CÔNG TY TNHH QUÂN HÀO',
                'ten_nguoi_dai_dien'    => 'Mr. Thành',
                'so_dien_thoai'         =>  0123123123,
                'email'                 => 'sales@quanhao.vn',
                'dia_chi'               => '46/39 Đường Hoàng Hoa Thám, KP. 3, P. Phú Lợi, TP. Thủ Dầu Một, Bình Dương',
                'ten_goi_nho'           => 'Mr. Thành',
            ],
            [
                'ma_so_thue'            => '011231288123',
                'ten_cong_ty'           => 'CÔNG TY TNHH ĐẦU TƯ VÀ KINH DOANH VIỆT Á',
                'ten_nguoi_dai_dien'    => 'Mr. Thảo',
                'so_dien_thoai'         =>  0123123123,
                'email'                 => 'vietabusin@gmail.com',
                'dia_chi'               => 'Số 11A, Đường 2.2, Khu Đô Thị Gamuda Gardens, Trần Phú, Quận Hoàng Mai, TP. Hà Nội (TPHN)',
                'ten_goi_nho'           => 'Mr. Thảo',
            ],
            [
                'ma_so_thue'            => '1321288123',
                'ten_cong_ty'           => 'CÔNG TY TNHH SẢN XUẤT THƯƠNG MẠI QUỐC TẾ KHANG THỊNH',
                'ten_nguoi_dai_dien'    => 'Ông Trần Thanh Hải',
                'so_dien_thoai'         =>  0123123123,
                'email'                 => 'vietabusin@gmail.com',
                'dia_chi'               => '25/22 Bùi Quang Là, Phường 12, Quận Gò Vấp, TP Hồ Chí Minh (TPHCM)',
                'ten_goi_nho'           => 'Ông Trần Thanh Hải',
            ],

        ]);
    }
}
