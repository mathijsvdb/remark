@extends('2-newdesign.layouts.master')

@section('content')
    <div class="login-page">
        <div class="container">
            <form class="login-form" method="POST" action="/login">
                <h1 class="text-center">Login</h1>

                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                    <a class="pull-right" href="/password/email">Forgot your password?</a>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </div>

                <p>Need an account? <a href="/register">Sign up here!</a></p>
            </form>
        </div>
    </div>


@stop