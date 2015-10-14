@extends('layouts.master')

@section('content')
<h1>Create an account!</h1>

<form method="POST" action="register">
    {!! csrf_field() !!}

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
</form>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="form-group has-error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop