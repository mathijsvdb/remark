<nav class="navbar navbar-default navbar_content">
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
                <!-- <img alt="Remark" src=""> -->
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/projects') }}">Projects</a></li>
                <li><a href="{{ url('/battles') }}">Battles</a></li>
                <li><a href="{{ url('/advertising') }}">Advertising</a></li>
                <li><a href="{{ url('/developers') }}">Developers</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile Menu <span class="glyphicon glyphicon-align-justify"></span></a>
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
