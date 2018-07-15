<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 */
class Event extends Model
{
    protected $table = 'event';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'picture',
        'user',
        'status',
        'penyelenggara',
        'address'
    ];

    protected $guarded = [];

        
}