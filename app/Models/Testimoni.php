<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimoni
 */
class Testimoni extends Model
{
    protected $table = 'testimoni';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'user',
        'category'
    ];

    protected $guarded = [];

        
}