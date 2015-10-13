@extends('layouts.master')
<!-- resources/views/auth/login.blade.php -->
@section('title', 'login')

@section('content')

<form method="POST" action="/login">
    {!! csrf_field() !!}

    <div>
        <label for="email">Email address</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div>
        <label for="remember"><input type="checkbox" name="remember">Remember me</label>
    </div>

    <div>
        <button type="submit" class="btn btn-default">Login</button>
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