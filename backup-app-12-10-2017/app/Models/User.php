<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    protected $table = 'users';
    
    public function Brand() {
        return $this->hasOne('App\Models\BrandDetail');
    }
    
    public function Location() {
        return $this->hasOne('App\Models\Location');
    }

}
