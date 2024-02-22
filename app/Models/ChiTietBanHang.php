<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBanHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_ban_hangs';

    protected $fillable = [
        'id_san_pham',
        'id_khach_hang',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'id_don_hang',
        'ten_san_pham',
    ];
}
