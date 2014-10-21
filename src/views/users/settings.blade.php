<?php 
  $language = [
    '' => 'Select Language',
    'EN' => 'EN',
    'LV' => 'LV',
    'ET' => 'ET',
  ];
?>

@extends(Config::get('xauth::login-layout'))

@section('title', 'Password Remind')

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
          Create New User
        </div>
        <div class="panel-body">
          {{Form::model($user)}}
            <!-- username Field -->
            <div class="form-group">
              {{ Form::label('username', 'Username') }}
              <input type="text" class="form-control" name="not_use" value="{{$user->username}}" disabled>
            </div>
            <!-- email Field -->
            <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email' , 'required' => 'required']) }}
            </div>
             <!-- language Field -->
            <div class="form-group">
              {{ Form::label('language', 'Language:') }}
              {{ Form::select('language', $language, null, ['class' => 'form-control', 'placeholder' => 'language' ]) }}
            </div>
            <!-- password Field -->
            <div class="form-group">
              {{ Form::label('password', 'Password:') }}
              {{ Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Current Password']) }}
            </div>
            <!-- password_confirm Field -->
            <div class="form-group">
              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password' ]) }}
            </div>
            <!-- password_confirm Field -->
            <div class="form-group">
              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'New Password Again']) }}
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