<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>App Name - @yield('title')</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>


    <div class="container">

        @include('layouts.nav')


        @yield('content')

        <footer>
            @include('layouts.footer')
        </footer>


    </div>

</body>

<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>

<script src="{{ URL::asset('assets/js/script.js') }}"></script>
</html>