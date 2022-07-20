<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'icon',
        'slug',
        'sub_1',
        'sub_2',
        'sub_3',
        'sub_4',
        'sub_5',
        'user',
    ];
}
