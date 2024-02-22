<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tin_tucs';

    protected $fillable = [
        'tieu_de',
        'slug_bai_viet',
        'hinh_anh',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'loai_bai_viet',
        'trang_thai',
    ];
}
