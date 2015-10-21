@extends("layouts.master")

@section("content")
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Do you want to make the most of your design?</h1>
                <hr>
                <p>At remark <b> students </b> like you post a design, then other students, start giving other students feedback on the design so that the students can learn from each other!</p>
                <a href="{{ url('/registreren') }}" class="btn btn-primary animation-bounce">Start here, It's FREE!</a>
            </div>
        </div>
    </header>

@stop