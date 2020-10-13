<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function emails(){
        return $this->hasMany(Email::class);
    }
}
