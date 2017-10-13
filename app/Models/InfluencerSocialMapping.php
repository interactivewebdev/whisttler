<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfluencerSocialMapping extends Model {

	protected $table = 'influencer_social_mapping';

	protected $fillable = [
			'influencer_id',
			'social_id',
			'social_type',
			'access_token',
			'total_reach',
			'total_followers',
			'engagements',
			'score',
			'status',
		];

	public function Socials() {
		return $this->hasOne('App\Models\SocialType');
	}

	public function Influencer() {
		return $this->hasOne('App\Models\User');
	}
}
