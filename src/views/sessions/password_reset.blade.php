@extends('xlayout::layouts.master')

@section('title', 'Password Remind')

@section('content')
	<div class="row">    
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          Reset Password
        </div>
        <div class="panel-body">
          {{Form::open()}}
            <div class='form-group'>
              <input class="form-control input" type="email" name="email" placeholder="Email">
            </div>
            <div class='form-group'>
              <input class="form-control input" type="password" name="password" placeholder="New Password">
            </div>
            <div class='form-group'>
              <input class="form-control input" type="password" name="password_confirm" placeholder="New Password Confirm">
            </div>
            <div class='form-group'>
              <input class="btn btn btn-block btn-success" type="submit" value="Reset Password" >
            </div>
        </div>
          {{Form::close()}}
      </div>
      
    </div>
  </div>
@stop