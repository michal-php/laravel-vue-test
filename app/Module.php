<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public function fields(){
        return $this->hasMany(Field::class);
    }

    public function fieldBlocks(){
        return $this->hasMany(FieldBlock::class);
    }
}
