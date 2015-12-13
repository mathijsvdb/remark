@extends('2-newdesign.layouts.master')

@section("content")
    <div class="signup-page">
        <div class="container">
            <form class="signup-form" method="post" action="/register">
                {!! csrf_field() !!}
                <h1 class="text-center">Register</h1>

                <div class="form-group">
                    <label for="firstName"">First name</label>
                    <input type="text" id="firstName" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Smith, Davis</span>
                </div>

                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" id="lastname" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Emma, Liam</span>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" placeholder="Username" value="{{ old('username') }}" name="username" class="form-control" required="required">
                    <span class="help-block">Choose something unique! </span>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="E-mail" name="email" class="form-control" value="{{ old('email') }}" required="required">
                    <span class="help-block">Example: u0000000&commat;student.thomasmore.be</span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required="required">
                    <span class="help-block">Minimum 6 characters</span>
                </div>

                <div class="form-group">
                    <label for="password">Confirm password</label>
                    <input type="password" id="password" name="password_confirmation" placeholder="Confirm password" class="form-control" required="required">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>

                <p>Already an account? <a href="/login">Log in here!</a></p>
            </form>
        </div>
    </div>
@stop