<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function fieldBlock(){
        return $this->belongsTo(FieldBlock::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function fieldType(){
        return $this->belongsTo(CFieldType::class);
    }


}
