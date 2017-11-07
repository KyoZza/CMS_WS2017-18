<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Create a many to many relationship to Roles
    public function users()
    {
      return $this->belongsToMany('App\User');
    }
}
