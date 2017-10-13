<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialMetaData;
use App\Models\InfluencerSocialMapping;

class SocialMetaController extends Controller {

    public static function post($data) {

        foreach ($data['result'] as $key => $value) {

            $meta_exists = SocialMetaData::where('influencer_id', $data['influencer_id'])
                                         ->where('social_type', $data['social_type'])
                                         ->where('meta_key', $key)
                                         ->first();

            if (is_null($meta_exists)) {

                $meta_data = new SocialMetaData;
                $meta_data->influencer_id = $data['influencer_id'];
                $meta_data->social_type = $data['social_type'];
                $meta_data->meta_key = $key;
                $meta_data->meta_value = $value;
                $meta_data->save();
            }
            else {

                $meta_exists->meta_value = $value;
                $meta_exists->save();
            }
        }

        $social_mapping = InfluencerSocialMapping::where('influencer_id', $data['influencer_id'])
                                                 ->where('social_type', $data['social_type'])
                                                 ->first();

        if(isset($social_mapping->score)) {
            
            $social_mapping->score = $data['score'];
            $social_mapping->save();
        }
 
        return 1;
    }

}
