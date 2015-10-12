<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Name - @yield('title')</title>
    <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>


<div class="container">
    @yield('content')
</div>

    @yield('footer')

</body>

<script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
</html>