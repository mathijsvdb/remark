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
    <div class="reset-page">
        <div class="container">
            <form class="reset-form" method="POST" action="/password/reset">
                <h1 class="text-center">Reset your password</h1>

                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>

                <button class="btn btn-primary" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
@stop