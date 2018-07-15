<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Galeri
 */
class Galeri extends Model
{
    protected $table = 'galeri';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'picture',
        'user'
    ];

    protected $guarded = [];

        
}