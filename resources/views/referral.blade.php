@extends('layouts.master')

@section("content")
    <div class="add-project-page">
        <div class="container">
            @if(!empty(Session::get('info')))
                <div class="alert alert-success">
                    <strong>{!! Session::get('info') !!}</strong>
                </div>
            @endif
            <form method="post" url="/referral" role="form" class="add-project-form">
                {!! csrf_field() !!}

                <h1 class="text-center">Refer a Friend</h1>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="form-group has-error">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Your friend's email</label>
                    <span class="help-block">Do you have a talented friend? refer him now!</span>
                    <input type="email" id="referral-email" placeholder="Friends e-mail" name="referral-email" class="form-control">
                </div>
                <div class="form-group">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Invite!</button>
                </div>

                <p>Don't have any friends to refer? <a href="/">Skip this step</a></p>
            </form> <!-- /form -->
        </div>
    </div>
@stop