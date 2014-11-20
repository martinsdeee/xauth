<?php
  
?>

@extends(Config::get('xauth::default-layout'))

@section('title', 'Change Password')

@section('content')
	<div class="row">
    <div class="col-md-4 col-md-offset-4">

      @if($errors->count()>0)
      <ul class="alert alert-danger">
        @foreach ($errors->all() as $key => $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          Change Password
        </div>
        <div class="panel-body">
          {{Form::model($user)}}
            <!-- username Field -->
            <div class="form-group">
              {{ Form::label('username', 'Username') }}
              <input type="text" class="form-control" name="not_use" value="{{$user->username}}" disabled>
            </div>
            <!-- Password Field -->
            <div class="form-group">
            	{{ Form::label('password', 'Password:') }}
            	{{ Form::password('password', ['class' => 'form-control']) }}
            </div>

            <!-- Password Confirmation Field -->
            <div class="form-group">
            	{{ Form::label('password_confirmation', 'Password Confirmation:') }}
            	{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>
                                    
            <hr>
            <div class='form-group'>
              <input class="btn btn btn-block btn-success" type="submit" value="Update" >
            </div>
        </div>
          {{Form::close()}}
      </div>

    </div>
  </div>
@stop