@extends('layouts.master')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="form-group has-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section("content")
    <div class="registrer content-box">
        <form class="form-horizontal" method="post" action="register" role="form">
            {!! csrf_field() !!}
            <h2>Register</h2>
            <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Last name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Emma, Liam </span>
                </div>
                <label for="firstName" class="col-sm-3 control-label">First name</label>
                <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Smith, Davis</span>
                </div>

            </div>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Your unique username</label>
                <div class="col-sm-9">
                    <input type="username" placeholder="Username" value="{{ old('username') }}" name="username" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="E-mail" name="email" class="form-control" value="{{ old('email') }}" required="required">
                    <span class="help-block">Example: u0000000&commat;student.thomasmore.be</span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" name="password_confirmation" placeholder="Confirm password" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block register_button">Register</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>

@stop