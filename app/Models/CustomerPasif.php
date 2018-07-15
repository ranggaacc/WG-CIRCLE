<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerPasif
 */
class CustomerPasif extends Model
{
    protected $table = 'customer_pasif';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'middle_name',
        'closing_date',
        'id_card',
        'no_member',
        'no_pengajuan',
        'email',
        'hp',
        'jalan',
        'kota',
        'provinsi',
        'negara',
        'kodepos',
        'lokasi_diminati',
        'tipe_diminati',
        'picture',
        'user',
        'status'
    ];

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\Models\Product','lokasi_diminati','id');
    }

    public function pesanan() {
        return $this->belongsTo('App\Models\Pesanan','no_pengajuan','id_customer');
    }


        
}