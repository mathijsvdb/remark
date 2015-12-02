
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

                    <li>
                        <a href="{{ url('/projects') }}">Projects</a>
                    </li>

                    <li>
                        <a href="{{ url('/battles') }}">Battles</a>
                    </li>

                    <li>
                        <a href="{{ url('/advertising') }}">Advertising</a>
                    </li>

                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile Menu <span class="glyphicon glyphicon-align-justify"></span></a>
                        <ul class="dropdown-menu">

                            @if(Auth::check())
                                <li>
                                    <a href="{{ url('/profile/' . Auth::user()->id) }}">My Profile</a>

                                    @if(true)
                                        <span class="profile-notification" aria-hidden="true">1</span>
                                    @endif
                                </li>

                                <li><a href="{{ url('/projects/add') }}">Add project +</a></li>
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
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
