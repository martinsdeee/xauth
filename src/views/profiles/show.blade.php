<?php
	//dd(Auth::user());
	$skills = explode(',', $user->profile->skills);
?>

@extends(Config::get('xauth::default-layout'))

@section('meta-title', 'Profile')

@section('content')
<style>
.margin-top-like-h2 {
	margin-top:20px;
}
</style>
  <div class="row">
	<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
		<div class="well clearfix">
			<div class="col-sm-12">
				<div class="col-xs-12 col-sm-8">
					<h2 class="margin-top-like-h2">{{$user->profile->firstname}} {{$user->profile->lastname}}</h2>
					@if(Config::get('xauth::module')=== 'org')
	                    <p><strong>Company: </strong> {{$user->profile->company}}</p>
	                    <p><strong>Organization: </strong>{{$user->profile->organization}}</p>
	                    <p><strong>Object: </strong>{{$user->profile->object}}</p>
	                    <p><strong>Department: </strong>{{$user->profile->department}}</p>
                    @endif
                    <p><strong>Job Title: </strong> {{$user->profile->title}}</p>
                    <p><strong>Skills: </strong>
                    	@foreach($skills as $skill)
                        	<span class="label label-success">{{$skill}}</span> 
                        @endforeach
                    </p>				
				</div>
				<div class="col-xs-12 col-sm-4 text-center">
					
					<figure>
						<img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-thumbnail img-responsive margin-top-like-h2">
						<figcaption>

						</figcaption>
					</figure>

				</div>

			</div>
			@if($user->isCurrent())
				<a href="{{route('profile.edit', $user->username)}}" class="btn btn-xs btn-default pull-right">
					<span class="glyphicon glyphicon-cog"></span>
				</a>
			@endif
		</div>		
	</div>
  </div>
@stop