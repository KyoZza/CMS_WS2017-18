<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeHeaderOptions extends Model
{
    // Create a relationship between ThemeHeaderOptions and Theme
    public function theme() {
        return $this->belongsTo('App\Theme');        
    }
}
