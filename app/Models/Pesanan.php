<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerPasif
 */
class Pesanan extends Model
{
    protected $table = 'pesanan';

    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_member',
        'tipe_customer',
        'id_product',
        'no_pesanan',
        'nilai_transaksi',
        'date_10',
        'date_20',
        'poin',
        'closing_fee',
        'sales_fee',
        'date_fee_1',
        'date_fee_2',
        'tipe_diminati_1',
        'tipe_diminati_2',
        'tipe_diminati_3',
        'tipe_diminati_4',
        'tipe_diminati_5',
        'tipe_diminati_6',
        'tipe_diminati_7',
    ];

    protected $guarded = [];

        
}