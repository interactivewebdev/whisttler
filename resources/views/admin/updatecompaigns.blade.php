@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="col-lg-9 admin">
            <div class="subAdminTable dsplyShow">
                <div class="borderSection">
                    <h3 class="pageHead">UPDATE CAMPAIGN</h3>
                </div>

                <div class="row border padd20">
                    <div class="col-lg-12">
                        <p>
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        </p>
                        <form method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <select name="purpose" id="purpose" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="Brand Awareness" {{ $compaigns[0]->purpose == 'Brand Awareness'?"selected":""}}>Brand Awareness</option>
                                    <option value="App Downloads" {{ $compaigns[0]->purpose == 'App Downloads'?"selected":""}}>App Downloads</option>
                                    <option value="Community Building" {{ $compaigns[0]->purpose == 'Community Building'?"selected":""}}>Community Building</option>
                                    <option value="Content Creation" {{ $compaigns[0]->purpose == 'Content Creation'?"selected":""}}>Content Creation</option>
                                    <option value="Engagement" {{ $compaigns[0]->purpose == 'Engagement'?"selected":""}}>Engagement</option>
                                    <option value="Event & Contests" {{ $compaigns[0]->purpose == 'Event & Contests'?"selected":""}}>Event & Contests</option>
                                    <option value="Reach" {{ $compaigns[0]->purpose == 'Reach'?"selected":""}}>Reach</option>
                                    <option value="Sampling" {{ $compaigns[0]->purpose == 'Sampling'?"selected":""}}>Sampling</option>
                                    <option value="Feedback/Review" {{ $compaigns[0]->purpose == 'Feedback/Review'?"selected":""}}>Feedback/Review</option>
                                    <option value="Shout Outs" {{ $compaigns[0]->purpose == 'Shout Outs'?"selected":""}}>Shout Outs</option>
                                    <option value="Traffic" {{ $compaigns[0]->purpose == 'Traffic'?"selected":""}}>Traffic</option>
                                    <option value="Sales" {{ $compaigns[0]->purpose == 'Sales'?"selected":""}}>Sales</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="social_platforms">Social Platforms</label>
                                <select name="social_platforms[]" id="social_platforms" class="form-control" multiple size="5">
                                    <option value="">-- Select --</option>
                                    @foreach($socialtypes as $socialtype)
                                    <option value="{{$socialtype['id']}}" {{ in_array($socialtype['id'],explode(',',$compaigns[0]->social_type_id))?"selected":""}}>{{$socialtype['social_name']}}</option>
                                    @endforeach                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select name="location" id="location" class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location['id']}}" {{ $compaigns[0]->location_id == $location['id']?"selected":""}}>{{$location['state_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category['id']}}" {{ $compaigns[0]->category_id == $category['id']?"selected":""}}>{{$category['category_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user">Influencers</label>
                                <select name="influencer[]" id="user" class="form-control" multiple size="5">
                                    <option value="">-- Select --</option>
                                    @foreach($influencers as $influencer)
                                    <option value="{{$influencer->id}}" {{ in_array($influencer->id,explode(',',$compaigns[0]->influencers))?"selected":""}}>{{$influencer->fname.' '.$influencer->lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="influencers_count">No. of Influencers</label>
                                <input type="text" class="form-control width40" value="{{ $compaigns[0]->no_of_influencers }}" name="influencers_count" id="influencers_count" placeholder="Number of Influencers">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control width40" value="{{ Carbon\Carbon::parse($compaigns[0]->start_date)->format('Y-m-d') }}" name="start_date" id="start_date" placeholder="Start Date">
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration of Compaign</label>
                                <input type="text" class="form-control width40" value="{{ $compaigns[0]->duration }}" name="duration" id="duration" placeholder="Duration of Compaign">
                            </div>
                            <div class="form-group">
                                <label for="budget">Budget</label>
                                <input type="text" class="form-control width40" value="{{ $compaigns[0]->budget }}" name="budget" id="budget" placeholder="Budget of Compaign">
                            </div>
                            <div class="form-group">
                                <label for="brief">Brief Description</label>
                                <textarea class="form-control" rows="15" name="brief" id="brief" placeholder="Brief Description of Compaign">
                                    {{ $compaigns[0]->brief_desc }}
                                </textarea>
                            </div>
                            <h3>COMPAIGN STATISTICS</h3>
                            <div class="form-group">
                                <br><br>
                                <h4>FACEBOOK STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="fb_like">Likes</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->fb_like)?$compaign_stat->fb_like:''}}" name="fb_like" id="fb_like">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fb_share">Shares</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->fb_share)?$compaign_stat->fb_share:''}}" name="fb_share" id="fb_share">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fb_comment">Comments</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->fb_comment)?$compaign_stat->fb_comment:''}}" name="fb_comment" id="fb_comment">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fb_engagement">Total Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->fb_engagement)?$compaign_stat->fb_engagement:''}}" name="fb_engagement" id="fb_engagement">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fb_reach">Reach</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->fb_reach)?$compaign_stat->fb_reach:''}}" name="fb_reach" id="fb_reach">
                                    </div>
                                </div>
                                <br><br>
                                <h4>TWITTER STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="tw_like">Likes</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_like)?$compaign_stat->tw_like:''}}" name="tw_like" id="tw_like">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tw_retweet">Retweet</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_retweet)?$compaign_stat->tw_retweet:''}}" name="tw_retweet" id="tw_retweet">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tw_replies">Replies</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_replies)?$compaign_stat->tw_replies:''}}" name="tw_replies" id="tw_replies">
                                    </div>                                    
                                    <div class="col-md-2">
                                        <label for="tw_engagement">Total Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_engagement)?$compaign_stat->tw_engagement:''}}" name="tw_engagement" id="tw_engagement">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tw_reach">Reach</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_reach)?$compaign_stat->tw_reach:''}}" name="tw_reach" id="tw_reach">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tw_clicks">Link Clicks</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->tw_clicks)?$compaign_stat->tw_clicks:''}}" name="tw_clicks" id="tw_clicks">
                                    </div>
                                </div>
                                <br><br>
                                <h4>INSTAGRAM STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="ig_like">Likes</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->ig_like)?$compaign_stat->ig_like:''}}" name="ig_like" id="ig_like">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ig_impressions">Impressions</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->ig_impressions)?$compaign_stat->ig_impressions:''}}" name="ig_impressions" id="ig_impressions">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ig_comment">Comments</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->ig_comment)?$compaign_stat->ig_comment:''}}" name="ig_comment" id="ig_comment">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ig_engagements">Total Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->ig_engagements)?$compaign_stat->ig_engagements:''}}" name="ig_engagements" id="ig_engagements">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ig_reach">Reach</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->ig_reach)?$compaign_stat->ig_reach:''}}" name="ig_reach" id="ig_reach">
                                    </div>
                                </div>
                                <br><br>
                                <h4>YOUTUBE STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="yt_upvotes">Upvotes</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_upvotes)?$compaign_stat->yt_upvotes:''}}" name="yt_upvotes" id="yt_upvotes">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_share">Shares</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_share)?$compaign_stat->yt_share:''}}" name="yt_share" id="yt_share">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_comment">Comments</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_comment)?$compaign_stat->yt_comment:''}}" name="yt_comment" id="yt_comment">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_views">Total Views</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_views)?$compaign_stat->yt_views:''}}" name="yt_views" id="yt_views">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="yt_engagement">Total Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_engagement)?$compaign_stat->yt_engagement:''}}" name="yt_engagement" id="yt_engagement">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_duration">Duration of Views</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_duration)?$compaign_stat->yt_duration:''}}" name="yt_duration" id="yt_duration">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_impressions">Annotation Impressions</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_impressions)?$compaign_stat->yt_impressions:''}}" name="yt_impressions" id="yt_impressions">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="yt_clicks">Annotation Clicks</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->yt_clicks)?$compaign_stat->yt_clicks:''}}" name="yt_clicks" id="yt_clicks">
                                    </div>
                                </div>
                                <br><br>
                                <h4>BLOG STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="blog_views">Views</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->blog_views)?$compaign_stat->blog_views:''}}" name="blog_views" id="blog_views">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="blog_view_time">View Time</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->blog_view_time)?$compaign_stat->blog_view_time:''}}" name="blog_view_time" id="blog_view_time">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="blog_engagements">Engagement Rate</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->blog_engagements)?$compaign_stat->blog_engagements:''}}" name="blog_engagements" id="blog_engagements">
                                    </div>
                                </div>
                                <br><br>
                                <h4>QUORA STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="quora_view">Views</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->quora_view)?$compaign_stat->quora_view:''}}" name="quora_view" id="quora_view">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quora_upvotes">Upvotes</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->quora_upvotes)?$compaign_stat->quora_upvotes:''}}" name="quora_upvotes" id="quora_upvotes">
                                    </div>
                                </div>
                                <br><br>
                                <h4>SNAPCHAT STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="snapchat_story_views">Story Views</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->snapchat_story_views)?$compaign_stat->snapchat_story_views:''}}" name="snapchat_story_views" id="snapchat_story_views">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="snapchat_screenshots">Screenshots</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->snapchat_screenshots)?$compaign_stat->snapchat_screenshots:''}}" name="snapchat_screenshots" id="snapchat_screenshots">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="snapchat_fallout">Story Fallout Ratio</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->snapchat_fallout)?$compaign_stat->snapchat_fallout:''}}" name="snapchat_fallout" id="snapchat_fallout">
                                    </div>
                                </div>
                                
                                <br><br>
                                <h4>OVERALL CAMPAIGN STATISTICS</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="overall_reach">Total Reach</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->overall_reach)?$compaign_stat->overall_reach:''}}" name="overall_reach" id="overall_reach">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="overall_engagement">Total Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->overall_engagement)?$compaign_stat->overall_engagement:''}}" name="overall_engagement" id="overall_engagement">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="overall_roi_reach">Campaign ROI - Reach</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->overall_roi_reach)?$compaign_stat->overall_roi_reach:''}}" name="overall_roi_reach" id="overall_roi_reach">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="overall_roi_engagement">Campaign ROI - Engagement</label>
                                        <input type="text" class="form-control" value="{{isset($compaign_stat->overall_roi_engagement)?$compaign_stat->overall_roi_engagement:''}}" name="overall_roi_engagement" id="overall_roi_engagement">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">PUSH TO BRAND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection