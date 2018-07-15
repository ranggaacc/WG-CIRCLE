<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAktif
 */
class CustomerAktif extends Model
{
    protected $table = 'customer_aktif';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'middle_name',
        'id_card',
        'no_member',
        'closing_date',
        'no_pengajuan',
        'lokasi_diminati',
        'picture',
        'user',
        'status',
        'telephone',
    ];

    protected $guarded = [];

    public function product() {
        return $this->belongsTo('App\Models\Product','lokasi_diminati','id');
    }

    public function pesanan() {
        return $this->belongsTo('App\Models\Pesanan','no_pengajuan','id_customer');
    }
        
}