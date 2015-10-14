@extends("layouts.master")

@section("content")

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Wil je het beste uit je design halen?</h1>
                <hr>
                <p>Bij remark posten <b>studenten</b> zoals jij hun design, daarna gaan andere studenten op het design feedback geven waardoor de studenten kunnen leren van elkaar!</p>
                <a href="{{ url('/registreren') }}" class="btn btn-primary">Begin hier, het is gratis!</a>
            </div>
        </div>
    </header>

@stop