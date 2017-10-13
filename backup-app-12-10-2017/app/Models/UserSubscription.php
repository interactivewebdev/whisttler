<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $table = 'user_subscriptions';
    
    
    public function brands() {
        
        return $this->hasOne('App\Models\User');
    }
    
    public function subscription() {
        
        return $this->hasOne('App\Models\SubscriptionPlan');
    }
}