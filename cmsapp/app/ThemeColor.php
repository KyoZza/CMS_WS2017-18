<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeColor extends Model
{
    // Create a relationship between ThemeColor and GeneralOptions
    public function generalOptions() {
        return $this->belongsTo('App\GeneralOptions');        
    }
}
