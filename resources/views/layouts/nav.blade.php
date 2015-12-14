<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ URL::asset('assets/images/remark-logo.svg') }}" width="140" alt="Remark">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/battles">Battles</a></li>
                <li><a href="/advertising">Advertising</a></li>
                <li><a href="/developers">Developers</a></li>
            </ul>

            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="/activity"><i class="fa fa-bell-o"></i></a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->firstname . " " . Auth::user()->lastname }} <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/profile/' . Auth::user()->username) }}">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown"><a href="{{ url('/logout') }}" >Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/register">Sign up</a></li>
                    <li><a href="/login">Log in</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>