<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhapKho extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_hoa_don_nhap_khos';

    protected $fillable = [
        'ten_san_pham',
        'so_luong_nhap',
        'don_gia_nhap',
        'thanh_tien',
        'id_hoa_don_nhap',
        'id_san_pham',
    ];
}
