@extends('2-newdesign.layouts.master')

@section('content')
    <div class="reset-email-page">
        <div class="container">
            <form class="reset-email-form" method="POST" action="/password/email">
                <h1 class="text-center">Reset your password</h1>
                {!! csrf_field() !!}

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

                <button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
            </form>
        </div>
    </div>
@stop