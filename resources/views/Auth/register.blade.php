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
                    <input type="username" placeholder="Username" value="{{ old('username') }}" name="username" class="form-control" required="required">
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
                <label for="email" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <h2>Reffer friends</h2>
                    <span class="help-block">Do you have a talented friend? refer him and get higher in to the waiting list</span>
                    <input type="email" id="refer_email" placeholder="Friends e-mail" name="refer_email" class="form-control" value="{{ old('email') }}" >
                    <input type="email" id="refer_email2" placeholder="Friends e-mail" name="refer_email2" class="form-control" value="{{ old('email') }}" >
                    <input type="email" id="refer_email3" placeholder="Friends e-mail" name="refer_email3" class="form-control" value="{{ old('email') }}" >

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