<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandInfluencerMapping extends Model
{
    protected $table = 'brand_influencer_mapping';
    
    
    public function influencers() {
        
        return $this->hasOne('App\Models\User');
    }
    
    public function brands() {
        
        return $this->hasOne('App\Models\User');
    }
}