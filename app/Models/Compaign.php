<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compaign extends Model {

    protected $table = 'campaigns';

    public function statistics() {
        return $this->hasOne('App\Models\CompaignStat');
    }

}
