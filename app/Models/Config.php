<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'configs';

    protected $fillable = [
        'list_image',
        'list_title',
        'list_des',
        'list_link',
        'list_bestsale',
        'list_sale',
        'image_slide_1',
        'image_slide_2',
        'title_slide_1',
        'title_slide_2',
        'des_slide_1',
        'des_slide_2',
    ];
}
