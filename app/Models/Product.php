<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 */
class Product extends Model
{
    protected $table = 'product';

    public $timestamps = true;

    protected $fillable = [
        'kode',
        'name',
        'description',
        'picture_3D',
        'user',
        'status',
        'segmentasi',
        'price_list',
        'progress',
        'website',
        'marketing_book',
        'lokasi_lat',
        'lokasi_long',
        'alamat',
        'logo'
    ];

    protected $guarded = [];

        
}