<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CFieldType extends Model
{
    public function field(){
        return $this->hasMany(Field::class);
    }
}
