<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // Create a relationship between Activity and User
    public function user() {
        return $this->belongsTo('App\User');        
    }
}
