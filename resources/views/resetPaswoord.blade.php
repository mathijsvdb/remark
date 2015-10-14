@extends("layouts.master")

@section("content")

    <div class="reset_paswoord">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Maak hier je nieuw wachtwoord</h1>
                <div class="account-wall">
                    <form class="form-signin">
                        <input type="password" class="form-control" placeholder="Nieuw wachtwoord" required autofocus>
                        <input type="password" class="form-control" placeholder="Herhaal wachtwoord" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Bevestigen</button>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop