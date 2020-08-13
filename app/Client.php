<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['username' , 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
