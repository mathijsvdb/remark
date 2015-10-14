@extends("layouts.master")

@section("content")
    <div class="registrer">
        <form class="form-horizontal" role="form">
            <h2>Registreren</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Full name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" placeholder="Lastname" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Emma, Liam </span>
                    <input type="text" id="firstName" placeholder="Name" class="form-control" autofocus required="required">
                    <span class="help-block">Example: Smith, Davis</span>
                </div>

            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Student Email</label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" required="required">
                    <span class="help-block">Example: u0000000&commat;student.thomasmore.be</span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Bevestig" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">I <bold>accept</bold> the <a href="#">Terms</a>
                        </label>
                    </div>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>
@stop