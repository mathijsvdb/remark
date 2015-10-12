<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Name - @yield('title')</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">

</head>
<body>
    <div class="background-image"></div>
    <div class="container">

        <header class="row">
            @include('layouts.nav')
        </header>

        @yield('content')

        <footer>
            @include('layouts.footer')
        </footer>


    </div>

</body>

<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/script.js') }}"></script>
</html>