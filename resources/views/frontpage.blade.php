@extends("layouts.master")

@section("content")
    @if(!empty(Session::get('info')))
        <div class="alert alert-success">
            <strong>{!! Session::get('info') !!}</strong>
        </div>
    @endif

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

    <section id="spotlight">
        <h2>Spotlight</h2>
        <!-- <img src="http://placehold.it/350x150"> -->
        <div class="row">
            <div class="col-md-8">
                <form class="form" id="searchonfrontpage">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="..." name="search" placeholder="What are you looking for?" id="searchFRONT">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" id="searchbutton">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-md-4">
                <form class="form" action="">
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Filter by tag
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Illustrator</a></li>
                                <li><a href="">Photoshop</a></li>
                                <li><a href="">Mobile Design</a></li>
                                <li><a href="">Logo's</a></li>
                                <li><a href="">Posters</a></li>
                                <li><a href="">Material Design</a></li>
                                <li><a href="">Branding</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            <?php //var_dump($projects); ?>

        <div class="imagelist">

            <?php
            if(isset($products)){ ?>
            @foreach($products as $product)
                <div class="col-md-4">
                    <a href="/projects/{!! $product->id !!}">
                        <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $product->img !!}" alt="">
                    </a>
                    <a href="/profile/{!! $product->user_id !!}">
                        <p style="text-transform: uppercase">{!! $product->username !!}</p>
                    </a>
                </div>
            @endforeach
            <?php } else { ?>
            @foreach($spotlight as $work)
                <div class="col-md-4">
                    <a href="/projects/{!! $work->id !!}">
                        <img style="width: 300px; height: 300px;list-style: none" src="/uploads/{!! $work->img !!}" alt="">
                    </a>
                    <a href="/profile/{!! $work->user_id !!}">
                        <p style="text-transform: uppercase">{!! $work->username !!}</p>
                    </a>
                </div>
            @endforeach
                <?php }
            ?>

        </div>

        </div>
        
    </section>

@stop

@section('scripts')
    <script>

        $(document).ready(function() {
            //$(function() {
                //search function

                $("#searchonfrontpage").submit(function(e){
                    e.preventDefault();

                    var whattosearch = $("#searchFRONT").val();
                    console.log("searching... " + whattosearch + ".");
                    var _token = "{{ csrf_token() }}";
                    console.log(_token);

                    $.ajax({
                        type: "POST",
                        //url: window.location,
                        url: "/",   // This is what I have updated
                        data: { whattosearch: whattosearch, _token: _token },
                        success : function(data){
                            console.log(data);
                        },error: function(jqXHR, textStatus, errorThrown, data) {
                            console.log(textStatus, errorThrown);
                            console.log(data);
                        },always: function(data){console.log(data);}
                    });

                });
            //});
        });
    </script>

@stop