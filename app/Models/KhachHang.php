<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    use HasFactory;

    protected $table = 'khach_hangs';

    protected $fillable = [
        'ho_lot',
        'ten_khach',
        'ho_va_ten',
        'email',
        'password',
        'so_dien_thoai',
        'gioi_tinh',
        'ngay_sinh',
        'is_active',
        'hash_active',
        'hash_reset',
    ];
}
