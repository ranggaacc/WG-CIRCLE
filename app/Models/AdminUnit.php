<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class AdminUnit extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'id_card',
        'middle_name',
        'last_name',
        'jalan',
        'kota',
        'provinsi',
        'id_product',
        'kodepos',
        'group_member',
        'sumber',
        'email',
        'birthdate',
        'img',
        'role',
        'status',
        'activated',
        'gender',
        'hp'
    ];

    protected $guarded = [];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product','id_product','id');
    }


    
}