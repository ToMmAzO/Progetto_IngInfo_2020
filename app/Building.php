<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $connection = 'mysql';
    protected $collection = 'buildings';

    protected $fillable = [
        'codice', 'indirizzo', 'salcazzo'
    ];
}
