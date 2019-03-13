<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name', 'surnames', 'numCompte', 'dni', 'email', 'cuote_id', 'active'
    ];
    
    public function cuote()
    {
        //return $this->hasOne(Cuote::class, 'id');
        return $this->belongsTo('App\Cuote', 'cuote_id');
    }
}
