<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reward
 */
class Reward extends Model
{
    protected $table = 'reward';

    public $timestamps = true;

    protected $fillable = [
        'id_product',
        'name',
        'user',
        'category',
        'value',
        'type',
        'status'
    ];

    protected $guarded = [];

        
}