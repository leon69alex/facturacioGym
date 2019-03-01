<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuote extends Model
{
    public function client()
    {

        //return $this->belongsTo(Client::class, 'id');

        return $this->hasOne(Client::class);
    }
}
