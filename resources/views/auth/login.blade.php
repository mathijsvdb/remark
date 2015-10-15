@extends('layouts.master')


@section('content')


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="form-group has-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="login_mini">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Login om verder te gaan</h1>
                <div class="account-wall">
                    <form class="form-signin" method="POST" action="/login">
                        {!! csrf_field() !!}
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" name="remember" >
                            Remember me
                        </label>
                        <a href="/password/email" class="pull-right need-help">Forgot password? </a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="/register" class="text-center new-account">Create an account </a>
            </div>
        </div>
    </div>

@stop