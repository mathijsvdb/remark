@extends('old-design.layouts.master')

@section("content")
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="form-group has-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="registrer content-box">
        <form class="form-horizontal" method="post" url="/referral" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <h2>Refer a friend</h2>
                    <span class="help-block">Do you have a talented friend? refer him now!</span>
                    <input type="email" id="referral-email" placeholder="Friends e-mail" name="referral-email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Invite!</button>
                </div>

                <p>Don't have any friends?<a href="/">Click here</a></p>
            </div>
        </form> <!-- /form -->
    </div>

@stop