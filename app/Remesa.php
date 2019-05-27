<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remesa extends Model
{
    protected $table = 'remeses';

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'remeses_clients');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
