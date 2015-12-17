@extends("layouts.master")

@section("content")
    <div class="developer-top">
        <div class="container-fluid">
            <h1>Use Remark data for your project</h1>
        </div>
    </div>

    <div class="container developer-content">
        <h2>Remark API v1</h2>

        <p>Our API allows you to add data from our platform to your application. You can show single projects of the most popular projects.</p>
        <p>Have fun developing!</p>

        <h3>API Key</h3>

        @if(Auth::user()->apikey)
            <p>Use your API key for authentication to access the Remark API. In the documentation you can find how to provide your API key.</p>

            <div class="input-group">
                <input type="text" id="apikey" class="form-control" readonly value="{{ Auth::user()->apikey->apikey }}">
                <div class="input-group-btn">
                    <button title="Copy to clipboard" class="btn btn-primary btn-copy" data-clipboard-target="#apikey"><i class="fa fa-clipboard fa-fw"></i></button>
                </div>
            </div>
        @else
            <p>To use our API you will need an API key to authenticate yourself.</p>


            <form action="" method="post">
                {!! csrf_field() !!}
                <div class="text-center form-group">
                    <p>You don't have an API key yet</p>
                    <button type="submit" class="btn btn-primary" id="generate_API_KEY">Generate API Key</button>
                </div>
            </form>
        @endif

        <h3>Documentation</h3>

        <p>The API provides the following endpoints:</p>

        <dl>
            <dt>/items/popular</dt>
            <dd>
                Returns the most popular projects ordered by likes. <br>
                This endpoint has a page and a perpage parameter (e.g. {{ url('/api/v1/items/popular?page=1&perpage=10&key=YOURAPIKEY') }})
            </dd>
            <br>
            <dt>/items/id</dt>
            <dd>
                Returns a project by ID. <br>
                This endpoint has an ID parameter (e.g.: {{ url('/api/v1/items/1?key=YOURAPIKEY') }}).
            </dd>
        </dl>
    </div>
@stop

@section('scripts')
    <script src="/assets/js/clipboard.min.js"></script>
    <script>
        var clipboard = new Clipboard('.btn-copy');

        clipboard.on('success', function(e) {
            $('.btn-copy').html('Copied!');
            setTimeout( function(){
                $('.btn-copy').html('<i class="fa fa-clipboard fa-fw"></i>');
            },1000);
        });
    </script>
@stop