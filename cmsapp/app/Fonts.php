<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonts extends Model
{
    // Create a relationship between Fonts and GeneralOptions
    public function generalOptions() {
        return $this->belongsTo('App\GeneralOptions');        
    }
}
