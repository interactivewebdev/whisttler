@extends('admin')
@section('content')  
<section>
	<div class="row">
		@include('admin.sidebar')
		<div class="admin" style="width:82%; float:right;">
			<div class="subAdminTable dsplyShow" style="margin-right: 20px;">
				<div class="borderSection">
					<h3 class="pageHead">NEW CAMPAIGN</h3>
				</div>
				<div style="margin:0 20px 100px;">
					<table style="width:100%;">
						<tr class="backClr txtcolor" style="height:30px;">
							<th width="5%">ID</th>
							<th width="20%">PURPOSE</th>
							<th width="15%">CATEGORY</th>
							<th width="20%">USER</th>
							<th width="10%">DATE</th>
							<th width="10%">DURATION</th>
							<th width="10%">BUDGET</th>
							<th width="10%" style="text-align:center;">ACTION</th>
						</tr>
						@if ( isset($compaigns) && count($compaigns) )
							@foreach($compaigns as $key=>$compaign)
								<tr style="height:30px;">
									<th scope="row">{{++$key}}</th>
									<td>{{$compaign->purpose}}</td>
									<td>{{$compaign->category_name}}</td>
									<td>{{$compaign->fname}}</td>
									<td>{{Carbon\Carbon::parse($compaign->start_date)->format('d-m-Y')}}</td>
									<td style="text-align:center;">{{$compaign->duration}}</td>
									<td style="text-align:center;">{{$compaign->budget}}</td>
									<td class="text-center">
										<a href="{{url('/admin/updatecompaign')}}/{{$compaign->id}}" style="border:none;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a href="{{url('/admin/approvecompaigns')}}/{{$compaign->id}}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
									</td>
								</tr>
							@endforeach
						@endif
					</table>
				</div>
				<div class="row border padd20">
					<div class="col-lg-9">
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
								<label for="user">User</label>
								<select name="user" id="user" class="form-control">
									<option value="">-- Select --</option>
									@if ( isset($users) && count( $users ) )
										@foreach($users as $user)
											<option value="{{$user->id}}" {{ Input::old('user') == $user->id?"selected":""}}>{{$user->fname .' '. $user->lname}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="purpose">Purpose</label>
								<select name="purpose" id="purpose" class="form-control">
									<option value="">-- Select --</option>
									<option value="Brand Awareness" {{ Input::old('purpose') == 'Brand Awareness'?"selected":""}}>Brand Awareness</option>
									<option value="App Downloads" {{ Input::old('purpose') == 'App Downloads'?"selected":""}}>App Downloads</option>
									<option value="Community Building" {{ Input::old('purpose') == 'Community Building'?"selected":""}}>Community Building</option>
									<option value="Content Creation" {{ Input::old('purpose') == 'Content Creation'?"selected":""}}>Content Creation</option>
									<option value="Engagement" {{ Input::old('purpose') == 'Engagement'?"selected":""}}>Engagement</option>
									<option value="Event & Contests" {{ Input::old('purpose') == 'Event & Contests'?"selected":""}}>Event & Contests</option>
									<option value="Reach" {{ Input::old('purpose') == 'Reach'?"selected":""}}>Reach</option>
									<option value="Sampling" {{ Input::old('purpose') == 'Sampling'?"selected":""}}>Sampling</option>
									<option value="Feedback/Review" {{ Input::old('purpose') == 'Feedback/Review'?"selected":""}}>Feedback/Review</option>
									<option value="Shout Outs" {{ Input::old('purpose') == 'Shout Outs'?"selected":""}}>Shout Outs</option>
									<option value="Traffic" {{ Input::old('purpose') == 'Traffic'?"selected":""}}>Traffic</option>
									<option value="Sales" {{ Input::old('purpose') == 'Sales'?"selected":""}}>Sales</option>

								</select>
							</div>
							<div class="form-group">
								<label for="social_platforms">Social Platforms</label>
								<select name="social_platforms[]" id="social_platforms" class="form-control" multiple size="5">
									<option value="">-- Select --</option>
									@if ( isset($socialtypes) && count( $socialtypes ) )
										@foreach($socialtypes as $socialtype)
											<option value="{{$socialtype['id']}}" {{ isset($compaigns[0]) && in_array($socialtype['id'],explode(',',$compaigns[0]->social_type_id))?"selected":""}}>{{$socialtype['social_name']}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="location">Location</label>
								<select name="location" id="location" class="form-control">
									<option value="">-- Select --</option>
									@if ( isset($locations) && count( $locations ) )
										@foreach($locations as $location)
											<option value="{{$location['id']}}" {{ Input::old('location') == $location['id']?"selected":""}}>{{$location['state_name']}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="category">Categories</label>
								<select name="category" id="category" class="form-control">
									<option value="">-- Select --</option>
									@if ( isset($categories) && count( $categories ) )
										@foreach($categories as $category)
											<option value="{{$category['id']}}" {{ Input::old('category') == $category['id']?"selected":""}}>{{$category['category_name']}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="user">Influencers</label>
								<select name="influencer[]" id="user" class="form-control" multiple size="5">
									<option value="">-- Select --</option>
									@if ( isset($influencers) && count( $influencers ) )
										@foreach($influencers as $influencer)
											<option value="{{$influencer->id}}">{{$influencer->fname.' '.$influencer->lname}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="influencers_count">No. of Influencers</label>
								<input type="text" class="form-control width40" value="{{ Input::old('influencers_count') }}" name="influencers_count" id="influencers_count" placeholder="Number of Influencers">
							</div>
							<div class="form-group">
								<label for="start_date">Start Date</label>
								<input type="date" class="form-control width40" value="{{ Input::old('start_date') }}" name="start_date" id="start_date" placeholder="Start Date">
							</div>
							<div class="form-group">
								<label for="duration">Duration of Compaign</label>
								<input type="text" class="form-control width40" value="{{ Input::old('duration') }}" name="duration" id="duration" placeholder="Duration of Compaign">
							</div>
							<div class="form-group">
								<label for="budget">Budget</label>
								<input type="text" class="form-control width40" value="{{ Input::old('budget') }}" name="budget" id="budget" placeholder="Budget of Compaign">
							</div>
							<div class="form-group">
								<label for="brief">Brief Description</label>
								<textarea class="form-control" rows="15" name="brief" id="brief" placeholder="Brief Description of Compaign">{{ Input::old('brief') }}</textarea>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection