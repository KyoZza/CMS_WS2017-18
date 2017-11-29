<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    // Create a relationship between Theme and ThemeHeaderOptions
    public function themeHeaderOptions() {
        return $this->hasMany('App\ThemeHeaderOptions');        
    }
}
