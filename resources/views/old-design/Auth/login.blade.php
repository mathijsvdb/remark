@extends('old-design.layouts.master')


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
            <div class="col-sm-6 col-md-4 col-md-offset-4 content-box vcenter login_container">
                <h1 class="text-center login-title">Login</h1>
                <hr>
                <div class="account-wall">
                    <form class="form-signin" method="POST" action="/login">
                        {!! csrf_field() !!}
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>

                        <button name="submit" class="btn btn-md btn-primary btn-block" type="submit">

                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" name="remember" >
                            Remember me
                        </label>

                    </form>
                    <div class="clearfix"></div>
                </div>
                <a href="/register" class="text-center new-account">Create an account </a>
                <a href="/password/email" class="pull-right need-help">Forgot password? </a>
            </div>
        </div>
    </div>

@stop