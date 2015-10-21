@extends("layouts.master")

@section("content")
<<<<<<< HEAD
=======
    @if(!empty(Session::get('info')))
        <div class="alert alert-success">
            <strong>{!! Session::get('info') !!}</strong>
        </div>
    @endif

>>>>>>> a0f2ba32520114a3920ed09b61721d34bc6beb10
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
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="..." name="search" placeholder="search">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default">Action</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filter by tag
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Illustrator</a></li>
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#">Mobile Design</a></li>
                        <li><a href="#">Logo's</a></li>
                        <li><a href="#">Posters</a></li>
                        <li><a href="#">Material Design</a></li>
                        <li><a href="#">Branding</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="imagelist">
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"><i class="fa fa-pencil"></i> Illustrator <i class="fa fa-mobile"></i> Mobile Design</p>
                    <!--<p class="imgbody">quasi architecto beatae vitae dicta sunt expl icabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>-->
                </div>
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"><i class="fa fa-camera-retro"></i> Photoshop <i class="fa fa-trademark"></i> Logo's</p>
                </div>
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"> <i class="fa fa-globe"></i> Web Design <i class="fa fa-black-tie"></i> Branding</p>
                </div>
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"><i class="fa fa-pencil"></i> Illustrator <i class="fa fa-mobile"></i> Mobile Design</p>
                    <!--<p class="imgbody">quasi architecto beatae vitae dicta sunt expl icabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>-->
                </div>
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"><i class="fa fa-camera-retro"></i> Photoshop <i class="fa fa-trademark"></i> Logo's</p>
                </div>
                <div class="col-md-4">
                    <img src="http://placehold.it/300x300"><a class="btn btn-default glyphicon glyphicon-hand-up frontlikebtn"></a><a class="btn btn-default glyphicon glyphicon-star frontfavbtn"></a>
                    <p class="imgtags"> <i class="fa fa-globe"></i> Web Design <i class="fa fa-black-tie"></i> Branding</p>
                </div>
            </div>
        </div>
        
    </section>

@stop