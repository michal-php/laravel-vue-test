<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
