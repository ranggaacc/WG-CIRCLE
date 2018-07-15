<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikel
 */
class InfoUmum extends Model
{
    protected $table = 'infoumum';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'kategori'
    ];

    protected $guarded = [];

        
}