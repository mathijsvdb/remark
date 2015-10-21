@extends('layouts.master')

<!--<form method="POST" action="register">


    <div class="form-group">
        First name
        <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">
    </div>

    <div class="form-group">
        Last name
        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
    </div>

    <div class="form-group">
        Username
        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
    </div>

    <div class="form-group">
        Email
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        Password
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        Confirm Password
        <input type="password" class="form-control" name="password_confirmation">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>-->

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
                <label for="firstName" class="col-sm-3 control-label">Full name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Emma, Liam </span>
                    <input type="text" id="firstName" placeholder="Name" name="firstname" value="{{ old('firstname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Smith, Davis</span>
                </div>

            </div>
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Student username</label>
                <div class="col-sm-9">
                    <input type="username" id="username" placeholder="Username" value="{{ old('username') }}" name="username" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Student Email</label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}" required="required">
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
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>

@stop