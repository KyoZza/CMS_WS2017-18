<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // Create a relationship between Page and User
    public function user() {
        return $this->belongsTo('App\User');        
    }
}
