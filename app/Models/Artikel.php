<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikel
 */
class Artikel extends Model
{
    protected $table = 'artikel';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'kategori',
        'user',
        'picture'
    ];

    protected $guarded = [];

        
}