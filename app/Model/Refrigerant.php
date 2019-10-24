<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refrigerant extends Model
{
    public function flavor(){
        return $this->belongsTo('App\Model\Flavor', 'flavor');
    }

    public function type(){
        return $this->belongsTo('App\Model\Type', 'type');
    }

    public function liter(){
        return $this->belongsTo('App\Model\Liter', 'liter');
    }
}
