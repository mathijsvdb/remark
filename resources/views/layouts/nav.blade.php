
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a></li>
                    @if(Auth::check())
                        <li>
                            <a href="{{ url('/profile/' . Auth::user()->id) }}">Profile</a>
                            <span class="profile-notification" aria-hidden="true">1</span>
                        </li>
                    @endif

                    <li>
                        <a href="{{ url('/battles') }}">Battles</a>
                    </li>

                    <li>
                        <a href="{{ url('/projects') }}">Projects</a>
                    </li>

                </ul>

                @if(true)
                    <ul class="nav navbar-nav nav-notification">
                        <li>
                            <a id="like"  href="#"> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>Like</a>
                        </li>
                        <li>
                            <a id="favorite" href="#"> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>Favorite</a>
                        </li>
                        <li>
                            <a id="comment" href="#"> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Comment</a>
                        </li>
                    </ul>
                @endif

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li><a href="{{ url('/projects/add') }}">Add project</a></li>
                        <li class="dropdown">
                            <a href="{{ url('/logout') }}" >Logout</a>
                        </li>
                    @else
                        <li><a href="{{ url('/register') }}">Sign up</a></li>
                        <li class="dropdown">
                            <a href="{{ url('/login') }}" >Sign in</a>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
