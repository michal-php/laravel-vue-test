<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldBlock extends Model
{
    public function fields(){
        return $this->hasMany(Field::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }

}
