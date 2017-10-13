<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMetaData extends Model {

	protected $table = 'social_meta_data';

	protected $fillable = [
			'social_type',
			'influencer_id',
			'meta_key',
			'meta_value',
			'status',
		];
}