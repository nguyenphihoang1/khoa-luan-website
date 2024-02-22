<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'ho_lot',
        'ten_khach',
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'id_khach_hang',
        'hash_don_hang',
        'phi_ship',
        'tien_hang',
        'tong_thanh_toan',
        'thanh_toan',
        'giao_hang',
    ];
}
