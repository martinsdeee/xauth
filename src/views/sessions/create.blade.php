@extends('xlayout::layouts.master')

@section('meta-title', 'Login')

@section('content')
  <div class="row">    
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          Login
        </div>
        <div class="panel-body">
          {{Form::open()}}
            <div class='form-group'>
              <input class="form-control input" type="text" name="usernameOrEmail" placeholder="Username Or Email">
            </div>
            <div class='form-group'>
              <input class="form-control input" type="password" name="password" placeholder="Password">
            </div>
                       
            <div class='form-group'>
              <input class="btn btn btn-block btn-success" type="submit" value="Login" >
            </div>
        </div>
        <div class="panel-footer overflow-hidden">
            <div class="form-group last-row">
              <label class="checkbox-label">
                <input type="checkbox" name="remember_me"> Remember Me
              </label>
              {{link_to_route('password.remind', 'Forgot Password', null, ['class' => 'pull-right'])}}
            </div>
        </div>
          {{Form::close()}}
      </div>
      
    </div>
  </div>
@stop
