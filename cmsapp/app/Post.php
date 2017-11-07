<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Create a relationship between Post and User
    public function user() {
        return $this->belongsTo('App\User');        
    }
}
