<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [

        'left_text',
        'middle_text',
        'right_text',
        'bottom_text',
        'copyright_text',
        
    ];
}
