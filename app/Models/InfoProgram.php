<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InfoProgram
 */
class InfoProgram extends Model
{
    protected $table = 'info_program';

    public $timestamps = true;

    protected $fillable = [
        'user',
        'title',
        'jenis',
        'description'
    ];

    protected $guarded = [];

        
}