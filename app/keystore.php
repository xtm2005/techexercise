<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keystore extends Model
{
    protected $table='keystores';
    protected $fillable = [
        'keyName',
        'keyValue'
    ];
}
