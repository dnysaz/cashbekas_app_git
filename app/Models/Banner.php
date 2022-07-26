<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [

        'banner_1',
        'banner_2',
        'banner_3',
        'banner_1_text',
        'banner_2_text',
        'banner_3_text',
        'user',
    ];
}
