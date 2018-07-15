<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'id_card',
        'middle_name',
        'last_name',
        'jalan',
        'norek',
        'npwp',
        'atasnama',
        'kota',
        'provinsi',
        'negara',
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
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];
        
}