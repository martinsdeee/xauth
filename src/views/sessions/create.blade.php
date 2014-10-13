@extends('xlayout::layouts.master')

@section('meta-title', 'Login')

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      {{Form::open()}}
        <div class='form-group'>
          <input class="form-control input" type="text" name="username" placeholder="Username">
        </div>
        <div class='form-group'>
          <input class="form-control input" type="password" name="password" placeholder="Password">
        </div>
        <div class='form-group'>
          <input class="btn btn btn-block btn-success" type="submit" value="Login" >
        </div>
      {{Form::close()}}
    </div>
  </div>
@stop
