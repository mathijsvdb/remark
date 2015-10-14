@extends("layouts.master")

@section("content")

        <form class="form-horizontal" role="form">
            <h2>Registreren</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Volledige naam</label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" placeholder="Achternaam" class="form-control" autofocus required="required">
                    <span class="help-block">Voorbeeld: Elena, Lucas </span>
                    <input type="text" id="firstName" placeholder="Voornaam" class="form-control" autofocus required="required">
                    <span class="help-block">Voorbeeld: Janssens, Peeters</span>
                </div>

            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Studente Email</label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" required="required">
                    <span class="help-block">Voorbeeld: u0000000&commat;student.thomasmore.be</span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Wachtwoord</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate" class="col-sm-3 control-label">Geboortedatum</label>
                <div class="col-sm-9">
                    <input type="date" id="birthDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Geslacht</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="femaleRadio" value="Female">Vrouw
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="maleRadio" value="Male">Man
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="uncknownRadio" value="Unknown">Geen van bijde
                            </label>
                        </div>
                    </div>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label for="school" class="col-sm-3 control-label">Campus</label>
                <div class="col-sm-9">
                    <select id="campus" class="form-control">
                        <option value="Mechelen">Thomas More Mechelen (Vest, Kruidtuin, Ham)</option>
                        <option value="Geel">Thomas More Geel</option>
                        <option value="Antwerpen">Thomas More Antwerpen</option>
                        <option value="gent">Thomas More Gent</option>
                    </select>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label class="control-label col-sm-3">Jaar</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="checkbox1jaar" value="1ste">1jaar
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="checkbox2de" value="2de">2jaar
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="checkbox3de" value="3de">3jaar
                        </label>
                    </div>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <div class="fcol-sm-9 col-sm-offset-3">
                    <label for="upload">Upload afbeelding</label>
                    <input type="file" id="upload">
                    <p class="help-block">Upload hier je avatar abeelding</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Ik <bold>accepteer</bold> de <a href="#">Algemene voorwaarde</a>
                        </label>
                    </div>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Registreer</button>
                </div>
            </div>
        </form> <!-- /form -->

@stop