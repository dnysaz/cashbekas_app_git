<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'ads_id',
        'user_id',
        'category',
        'sub_category',
        'photo1',
        'photo2',
        'photo3',
        'title',
        'price',
        'condition',
        'desc',
        'location',
        'address',
        'name',
        'phone',
        'agreement',
        'draft',
        'link',
        'status',
        'reason',
        'detail_reason',
        'report_reason',
        'stop_reason',
    ];
}
