@extends("layouts.master")

@section("content")
    <div class="developer-top">
        <div class="container-fluid">
            <h1>Use remark data for your project</h1>
        </div>
    </div>

    <div class="api_container row">
        <div class="content_api_container col-md-6 center-block">
            <div class="info_api ">

                <p>
                    Our API allows you to add data from our platform to your application. When calling an API that does not access private user data, you can use a simple API key. This key is used to authenticate your application for accounting purposes.
                </p>
                <p>
                    There are 2 different endpoints available. One that has <strong>popular</strong> and one that has <strong>details</strong> of all projects.
                    You can use 1 API key for both of these parameters.
                </p>



                <div class="user_api_key_container col-md-12 center-block content-box">
                    <h3>Your API Key</h3>

                    <form action="" method="post">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-default" id="generate_API_KEY">Generate Key</button>
                    </form>

                    <ul class="api_key_loop"> <!-- lus hier keys uit die gelinkt zijn aan de gebruiker.-->
                        <li>
                            <input id="key" type="text" value="Generate a key first.">
                        </li>
                    </ul>

                    <div class="remarkv1_api">
                    <h2>Remark API v1</h2>

                    <p>The API has the following endpoints:</p>

                    <ul>
                        <li>/items/popular</li>
                        <ul>
                            <li>
                                <p>This endpoint has a page and perpage parameter (e.g.{{ url('/api/v1/items/popular?page=1&perpage=1') }}).</p>
                                <p>It returns the most popular projects ordered by likes.</p>
                            </li>
                        </ul>
                        <li>/item/id</li>
                        <ul>
                            <li>
                                <p>This endpoint has an ID parameter (e.g.: {{ url('/api/v1/item/1') }}).</p>
                                <p>It returns a project by id.</p>
                            </li>
                        </ul>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop