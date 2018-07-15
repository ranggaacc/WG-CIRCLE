<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 */
class Transaction extends Model
{
    protected $table = 'transaction';

    public $timestamps = true;

    protected $fillable = [
        'kode_order',
        'note',
        'closing_date',
        'quantity',
        'user',
        'status',
        'id_product',
        'id_reward',
        'id_customer',
        'id_member'
    ];

    protected $guarded = [];

        
}