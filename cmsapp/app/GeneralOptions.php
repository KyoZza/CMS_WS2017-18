<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralOptions extends Model
{
    // Create a relationship between GeneralOptions and ThemeColor
    public function themeColor() {
        return $this->hasOne('App\ThemeColor');        
    }

    // Create a relationship between GeneralOptions and Fonts
    public function font() {
        return $this->hasOne('App\Fonts');        
    }
}
