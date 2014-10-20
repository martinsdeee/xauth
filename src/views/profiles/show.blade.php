@extends(Config::get('xauth::default-layout'))

@section('meta-title', 'Profile')

@section('content')
  <div class="row">    
   	Profile <span class="label label-success">{{$user->profile->firstname}}</span>
  </div>
@stop