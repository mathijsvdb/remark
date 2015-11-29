<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>App Name - @yield('title')</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/rewards.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/advertising.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


    <div class="container">

        @include('layouts.nav')


        @yield('content')


            @include('layouts.footer')



    </div>

</body>


<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>


<script src="{{ URL::asset('assets/js/script.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    });
</script>

@yield('scripts')

</html>