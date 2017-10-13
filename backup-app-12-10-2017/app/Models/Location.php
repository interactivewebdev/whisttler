<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'states';
    
   
    public function user() {
        return $this->hasOne('App\Models\User');
    } 
    
}