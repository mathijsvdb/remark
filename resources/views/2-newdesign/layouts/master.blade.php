<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Remark | Get feedback on your work</title>

    <meta property="og:site_name" content="Remark">
    <meta property="og:url" content="https://remark.weareimd.be">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Remark: Design Projects">
    <meta property="og:description" content="Remark is a website for students to get feedback on their design projects.">
    <meta property="og:image" content="http://remark.weareimd.be/images/Remark_logo.jpg">

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ URL::asset('assets/jquery-ui-1.11.4/jquery-ui.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/newdesign/css/master.css') }}">

    <link rel="icon" href="{{URL::asset('assets/images/favicon.png')}}" sizes="16x16 32x32" type="image/png">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="{{ URL::asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/jquery-ui-1.11.4/jquery-ui.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
</head>
<body>

    @include('layouts.nav')

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ URL::asset('assets/images/remark-logo.svg') }}" width="140" alt="Remark">
                </div>

                <div class="col-md-6">
                    <div class="ads">
                        <a class="pull-right ad" href="http://www.staggeringbeauty.com/"><img src="http://lorempixel.com/200/150" alt=""></a>
                        <a class="pull-right ad" href="http://www.trypap.com/"><img class="pull-right ad" src="http://lorempixel.com/200/150" alt=""></a>
                        <a class="pull-right ad" href="http://www.sanger.dk/"><img class="pull-right ad" src="http://lorempixel.com/200/150" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/googleanalytics.js') }}"></script>
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