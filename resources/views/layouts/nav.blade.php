
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
<<<<<<< HEAD
                    <li><a href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a></li>
                    <li>
                        <a href="{{ url('/profile') }}">Profile</a>
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    </li>
=======
                    <li class="active"><a href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
>>>>>>> a0f2ba32520114a3920ed09b61721d34bc6beb10
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    <li class="dropdown">
                        <a href="{{ url('/login') }}" >Login</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
