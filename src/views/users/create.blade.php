<?php 
  $company = [
    '' => 'Select Company',
    '0000' => '0000 SIA COMPANY LATVIA'
  ];
  $organization = [
    '' => 'Select Organization',
    'XX00' => 'XX00 ORGANIZATION' 
  ];

  $object = [
    '' => 'Select Object',
    'X000' => 'X000 OBJECT' 
  ];

  $department = [
    '' => 'Select Department',
    'X' => 'X DEPARTMENT' 
  ];

  $title = [
    '' => 'Select Job Title',
    'X' => 'X SPECIALIST' 
  ];

  if(class_exists('Dropdown')){
    $company = Dropdown::data('XX00', 'COMPANY', $company);
    $organization = Dropdown::data('XX00', 'ORG', $organization);
    $object = Dropdown::data('XX00', 'OBJECT', $object);
    $department = Dropdown::data('XX00', 'DEPARTMENT', $department);
    $title = Dropdown::data('XX00', 'TITLE', $title);
  }
  
?>

@extends(Config::get('xauth::default-layout'))

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
          {{Form::open()}}
            <!-- username Field -->
            <div class="form-group">
              {{ Form::label('username', 'Username') }}
              {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) }}
            </div>
            <!-- email Field -->
            <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email' , 'required' => 'required']) }}
            </div>
            <!-- password Field -->
            <div class="form-group">
              {{ Form::label('password', 'Password:') }}
              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password' , 'required' => 'required']) }}
            </div>
            <!-- password_confirm Field -->
            <div class="form-group">
              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Again' , 'required' => 'required']) }}
            </div>
            <hr>
            <!-- firstname Field -->
            <div class="form-group">
              {{ Form::label('firstname', 'Firstname, Lastname:') }}
              {{ Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Firstname']) }}
            </div>
            
            <div class='form-group'>
              {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Lastname']) }}
            </div>
            
            @if(Config::get('xauth::module')=== 'org')
            <div class='form-group'>
              {{ Form::label('company', 'Structure:') }}
              {{Form::select('company', $company, null, ['class'=>'form-control input'])}}
            </div>
            <div class='form-group'>
              {{Form::select('organization', $organization, null, ['class'=>'form-control input'])}}
            </div>
            <div class='form-group'>
              {{Form::select('object', $object, null, ['class'=>'form-control input'])}}
            </div>
            <div class='form-group'>
              {{Form::select('department', $department, null, ['class'=>'form-control input'])}}
            </div>
            <div class='form-group'>
              {{Form::select('title', $title, null, ['class'=>'form-control input'])}}
            </div>
            @elseif(Config::get('xauth::module')=== 'social')
            <div class='form-group'>
              {{ Form::label('title', 'Job title:') }}
              {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Job Title']) }}
            </div>

            @endif
            <!-- skills Field -->
            <div class="form-group">
              {{ Form::label('skills', 'Skills:') }}
              {{ Form::textarea('skills', null, ['rows'=>2,'class' => 'form-control']) }}
            </div>
            <div class='form-group'>
              {{ Form::label('phone', 'Contacts:') }}
              {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
            </div>
            <div class='form-group'>
              {{ Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile']) }}
            </div>
            @if(Config::get('xauth::module')=== 'org')
            <div class='form-group'>
              {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax Number']) }}
            </div>
            <div class='form-group'>
              {{ Form::text('inner', null, ['class' => 'form-control', 'placeholder' => 'Inner Phone Number']) }}
            </div>
            @endif
            <div class='form-group'>
              {{ Form::text('contact_email', null, ['class' => 'form-control', 'placeholder' => 'Contact Email']) }}
            </div>
            <hr>
            <div class='form-group'>
              <input class="btn btn btn-block btn-success" type="submit" value="Create User" >
            </div>
        </div>
          {{Form::close()}}
      </div>
      
    </div>
  </div>
@stop