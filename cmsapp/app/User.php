<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Create a relationship between User and Page
    public function pages() {
        return $this->hasMany('App\Page');        
    }

    // Create a relationship between User and Posts
    public function posts() {
        return $this->hasMany('App\Post');        
    }

    // Create a relationship between User and Activities
    public function activities() {
        return $this->hasMany('App\Activity');        
    }

    // Create a many to many relationship to Roles
    public function roles() {
      return $this->belongsToMany('App\Role');
    }

    /**
    * @param string|array $roles  
    */
    public function authorizeRoles($roles)
    {  
        if (is_array($roles)) {  
            return $this->hasAnyRole($roles);  
        }
    
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }
    
    /**
    * Check multiple roles
    * @param array $roles
    */   
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first(); 
    }
    
    /**
    * Check one role
    * @param string $role
    */  
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
