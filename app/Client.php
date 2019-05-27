<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name', 'surnames', 'CCC', 'IBAN', 'SWIFT', 'dni', 'email', 'cuote_id', 'active'
    ];
    
    public function cuote()
    {
        //return $this->hasOne(Cuote::class, 'id');
        return $this->belongsTo('App\Cuote', 'cuote_id');
    }

    public function remesa()
    {
        return $this->belongsToMany(Remesa::class, 'remeses_clients');

    }
}
