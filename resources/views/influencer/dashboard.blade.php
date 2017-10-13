@extends('admin')
@section('content')
<section>

	{{-- {{dump(Session::all())}} --}}

	<style type="text/css">
		.connect-plus {
			font-size: initial;
			border: none;
		}
	</style>
	<div class="row">

		@include('influencer.sidebar')

		<div class="col-lg-9 admin_margin20 admin">
			<div class="subAdminTable dsplyShow">
				<div class="Influncer_Total">

					{{--@php--}}

						{{--$reach = 0;--}}
						{{--$followers = 0;--}}
						{{--$engagement = 0;--}}

						{{--$reach_array = [--}}
							{{--];--}}

						{{--$followers_array = [--}}
								{{--// 'total_posts',--}}
								{{--// 'posts_count',--}}
								{{--// 'total_likes',--}}
								{{--// 'total_comment',--}}
								{{--// 'total_shares',--}}
								{{--'followers_count',--}}
								{{--'friends_count'--}}
								{{--// 'average_comment',--}}
								{{--// 'average_comments',--}}
								{{--// 'average_favorite',--}}
								{{--// 'average_likes',--}}
								{{--// 'average_retweet',--}}
								{{--// 'average_shares',--}}
							{{--];--}}

						{{--$engagement_array = [--}}
								{{--'average_engagement'--}}
							{{--];--}}

					{{--@endphp--}}

					{{--@if ( isset( $social_meta_data ) && count( $social_meta_data ) )--}}
						{{--@foreach ( $social_meta_data->toArray() as $count => $data )--}}

							{{--@php--}}

								{{--if ( isset( $data['meta_key'] ) && isset( $data['meta_value'] ) ) {--}}

									{{--if( in_array($data['meta_key'], $reach_array) ) {--}}
										{{--$reach = $data['meta_value'];--}}
									{{--}--}}
									{{--else if ( in_array($data['meta_key'], $followers_array) ) {--}}
										{{--$followers = $data['meta_value'];--}}
									{{--}--}}
									{{--else if ( in_array($data['meta_key'], $engagement_array) ) {--}}
										{{--$engagement = $data['meta_value'];--}}
									{{--}--}}
								{{--}--}}
								{{----}}
							{{--@endphp--}}

						{{--@endforeach--}}
					{{--@endif--}}

					{{-- <h4 class="txtAlign">TOTAL REACH : {{ isset($reach) ? number_format($reach, 0) : '0' }}</h4> --}}
					<h4 class="txtAlign">TOTAL REACH : {{ $total_reach }}</h4>
					<h4 class="txtAlign">ENGAGEMENT : {{ number_format($total_engagements,2) }}</h4>
				</div>
				<div class="filter">
					<span class="txtcolor">SOCIAL VALUE: {{$social_meta_data['score'] or '0'}}</span>
				</div>
				<div class="influncerSocial">
					<div class="margin20">
						@if ( isset( $influencer_data[ \Config::get('constants.social_type.facebook') ] ) )
						<a data-toggle="collapse" href="#collapseFacebook" aria-expanded="false" aria-controls="collapseFacebook">
						@endif	
						<div class="row iconAlign">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/fb_influ.png">
								<span class="socialHead">Facebook Profile</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.facebook') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/facebook')}}"><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif								
							</div>

							<div class="collapse" id="collapseFacebook">
							  <div class="card card-body">
							    <div class="row" style="margin:80px 10px 30px 10px;">
							    	<div class="col-md-3"><i class="fa fa-users" aria-hidden="true"></i> Reach: <span class="badge badge-secondary">{{$social_meta_data['facebook']['reach']}}</span></div>
							    	<div class="col-md-3"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Average Like: <span class="badge badge-secondary">{{$social_meta_data['facebook']['total_likes']}}</span></div>
							    	<div class="col-md-3"><i class="fa fa-commenting-o" aria-hidden="true"></i> Conversation Rate: <span class="badge badge-secondary">{{$social_meta_data['facebook']['conversation_rate']}}</span></div>
							    	<div class="col-md-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> Amplification: <span class="badge badge-secondary">{{$social_meta_data['facebook']['amplification']}}</span></div>
							    </div>
							  </div>
							</div>

						</div>

						@if ( isset( $influencer_data[ \Config::get('constants.social_type.facebook') ] ) )
						</a>
						@endif


						@if ( isset( $influencer_data[ \Config::get('constants.social_type.instagram') ] ) )
						<a data-toggle="collapse" href="#collapseInstagram" aria-expanded="false" aria-controls="collapseInstagram">
						@endif
						<div class="row iconAlign">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/instagram_influ.png">
								<span class="socialHead">Instagram Profile</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.instagram') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/instagram')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>

							<div class="collapse" id="collapseInstagram">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
										<div class="col-md-3"><i class="fa fa-users" aria-hidden="true"></i> Reach: <span class="badge badge-secondary">{{$social_meta_data['instagram']['reach']}}</span></div>
										<div class="col-md-3"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Average Like: <span class="badge badge-secondary">{{$social_meta_data['instagram']['avg_likes']}}</span></div>
										<div class="col-md-3"><i class="fa fa-commenting-o" aria-hidden="true"></i> Conversation Rate: <span class="badge badge-secondary">{{$social_meta_data['instagram']['average_comment']}}</span></div>
										<div class="col-md-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> Amplification: <span class="badge badge-secondary">{{$social_meta_data['instagram']['follows_count']}}</span></div>
									</div>
								</div>
							</div>

						</div>
						@if ( isset( $influencer_data[ \Config::get('constants.social_type.instagram') ] ) )
						</a>
						@endif

						@if ( isset( $influencer_data[ \Config::get('constants.social_type.twitter') ] ) )
						<a data-toggle="collapse" href="#collapseTwitter" aria-expanded="false" aria-controls="collapseTwitter">
						@endif
						<div class="row iconAlign">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/twit_influ.png">
								<span class="socialHead">Twitter Profile</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.twitter') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/twitter')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>

							<div class="collapse" id="collapseTwitter">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
										<div class="col-md-3"><i class="fa fa-users" aria-hidden="true"></i> Reach: <span class="badge badge-secondary">{{$social_meta_data['twitter']['reach']}}</span></div>
										<div class="col-md-3"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Average Like: <span class="badge badge-secondary">{{$social_meta_data['twitter']['follows']}}</span></div>
										<div class="col-md-3"><i class="fa fa-commenting-o" aria-hidden="true"></i> Conversation Rate: <span class="badge badge-secondary">{{$social_meta_data['twitter']['average_replies']}}</span></div>
										<div class="col-md-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> Amplification: <span class="badge badge-secondary">{{$social_meta_data['twitter']['average_engagement']}}</span></div>
									</div>
								</div>
							</div>

						</div>
						@if ( isset( $influencer_data[ \Config::get('constants.social_type.twitter') ] ) )
						</a>
						@endif

						@if ( isset( $influencer_data[ \Config::get('constants.social_type.google') ] ) )
						<a data-toggle="collapse" href="#collapseGoogle" aria-expanded="false" aria-controls="collapseGoogle">
						@endif
						<div class="row iconAlign">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/youtube_influ.png">
								<span class="socialHead">Youtube Channel</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.google') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/youtube')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>

							<div class="collapse" id="collapseGoogle">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
										<div class="col-md-3"><i class="fa fa-users" aria-hidden="true"></i> Reach: <span class="badge badge-secondary">{{$social_meta_data['youtube']['reach']}}</span></div>
										<div class="col-md-3"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Average Like: <span class="badge badge-secondary">{{$social_meta_data['youtube']['total_likes']}}</span></div>
										<div class="col-md-3"><i class="fa fa-commenting-o" aria-hidden="true"></i> Conversation Rate: <span class="badge badge-secondary">{{$social_meta_data['youtube']['total_comment']}}</span></div>
										<div class="col-md-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> Amplification: <span class="badge badge-secondary">{{$social_meta_data['youtube']['total_views']}}</span></div>
									</div>
								</div>
							</div>
						</div>
						@if ( isset( $influencer_data[ \Config::get('constants.social_type.google') ] ) )
						</a>
						@endif

						<div class="row iconAlign">
							<a data-toggle="collapse" href="#collapseBlog" aria-expanded="false" aria-controls="collapseBlog">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/web_influ.png">
								<span class="socialHead">Personal Blog / Website</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.blog') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/website')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>
							</a>

							<div class="collapse" id="collapseBlog">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
											<input type="hidden" name="social_type" value="5">
											<div class="col-md-offset-1 col-md-8"><input type="text" required placeholder="Please give Blog Url" name="url" value="{{$influencer_data[5]->social_id}}" class="form-control"></div>
											<div class="col-md-2"><button type="submit" class="btn btn-primary btn-xs">Submit URL</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>


						<div class="row iconAlign">
							<a data-toggle="collapse" href="#collapseSnapChat" aria-expanded="false" aria-controls="collapseSnapChat">
							<div class="col-xs-6 col-sm-10 pad0">
								<img src="{{url('/')}}/public/assets/images/snap_influ.png">
								<span class="socialHead">Snapchat Profile</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.snapchat') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp; 
								@else
									<a href="{{url('connect/snapchat')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>
							</a>

							<div class="collapse" id="collapseSnapChat">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
										<form method="post" action="{{url('/influencers/submitUrl')}}">.
											{!! csrf_field() !!}
											<input type="hidden" name="social_type" value="7">
											<div class="col-md-offset-1 col-md-8"><input type="text" required placeholder="Please give SnapChat Profile Url" name="url" value="{{$influencer_data[7]->social_id}}" class="form-control"></div>
											<div class="col-md-2"><button type="submit" class="btn btn-primary btn-xs">Submit URL</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>


						<div class="row iconAlign1">
							<a data-toggle="collapse" href="#collapseQuorra" aria-expanded="false" aria-controls="collapseQuorra">
							<div class="col-xs-6 col-sm-10 pad0">
								<span class="btn btn-default btn-xs"><i class="fa fa-quora" aria-hidden="true"></i></span>
								<span class="socialHead">Quorra Profile</span>
							</div>
							<div class="col-xs-6 col-sm-2 pad0">
								@if ( isset( $influencer_data[ \Config::get('constants.social_type.quorra') ] ) )
									<img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp;Connected&nbsp;
								@else
									<a href="{{url('connect/snapchat')}}" ><img src="{{url('/')}}/public/assets/images/brand_createplus.png"> &nbsp; Connect</a>
								@endif
							</div>
							</a>

							<div class="collapse" id="collapseQuorra">
								<div class="card card-body">
									<div class="row" style="margin:80px 10px 30px 10px;">
										<form method="post" action="{{url('/influencers/submitUrl')}}">.
											{!! csrf_field() !!}
											<input type="hidden" name="social_type" value="6">
											<div class="col-md-offset-1 col-md-8"><input type="text" required placeholder="Please give Quorra Url" name="url" value="{{$influencer_data[6]->social_id}}" class="form-control"></div>
											<div class="col-md-2"><button type="submit" class="btn btn-primary btn-xs">Submit URL</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				{{--<div class="Influncer_Total padd30 hide">
					<table class="table influncer_create">
						<thead class="text-center">
							<tr class="txtcolor ">
								<th>#ABCD</th>
								<th>#EFGH</th>
								<th>#IJKL</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>#541</td>
								<td>#541</td>
								<td>#541</td>                 
							</tr>
							<tr>
								<td>#541</td>
								<td>#541</td>
								<td>#541</td>          
							</tr>
						</tbody>
					</table>
				</div>--}}
			</div>
		</div>
</section>
@endsection