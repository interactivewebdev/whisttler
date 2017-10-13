<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfluencerDetail extends Model {

	protected $table = 'influencer_details';
	 
	protected $fillable = [
			'user_id',
			'social_type',
			'social_id',
			'access_token',
			'profile_pic_path',
			'category_id',
			'sub_category_id',
			'likes',
			'comments',
			'share',
			'status',
		];
}