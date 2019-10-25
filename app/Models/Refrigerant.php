<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refrigerant extends Model
{
    public function flavor(){
        return $this->belongsTo(Flavor::class, 'flavor');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'type');
    }

    public function liter(){
        return $this->belongsTo(Liter::class, 'liter');
    }
}
