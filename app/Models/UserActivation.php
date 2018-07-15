<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivation
 */
class UserActivation extends Model
{
    protected $table = 'user_activations';

    public $timestamps = true;

    protected $fillable = [
        'Id',
        'user_id',
        'token',
        'activated'
    ];

    protected $guarded = [];

        
}