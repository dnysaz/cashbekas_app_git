<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'sitename', 
        'sitelogo',
        'header_text',
        'left_image',
        'right_image',
        'body_image',
        'bottom_image',
    ];
}
