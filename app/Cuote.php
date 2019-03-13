<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuote extends Model
{
    protected $fillable = [
        'name', 'display_name', 'import'
    ];

    /* public function client()
    {

        //return $this->belongsTo(Client::class, 'id');

        return $this->hasOne(Client::class);
    } */
}
