<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandDetail extends Model {

    protected $table = 'brand_details';

    public function Category() {
        return $this->hasOne('App\Models\Category');
    }

    public function Subscription() {
        return $this->hasOne('App\Models\SubscriptionPlan');
    }

    public function Industrytype() {
        return $this->hasOne('App\Models\IndustryType');
    }

}
