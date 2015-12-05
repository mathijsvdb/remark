@extends("layouts.master")

@section("content")

    <div class="api_container row">
        <div class="content_api_container col-md-6 center-block">
            <div class="info_api ">
                <h2>Get API key here v1</h2>
                <p>
                    there are 2 different endpoints avilable. One that has <strong>popular</strong> and one that has <strong>details</strong> of all projects.
                    You can use 1 API key for both of these parameters.
                </p>



                <div class="user_api_key_container col-md-12 center-block content-box">
                    <h3>API Keys</h3>

                    <form action="" method="post">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-default" id="generate_API_KEY">Generate Key</button>
                    </form>

                    <ul class=""> <!-- lus hier keys uit die gelinkt zijn aan de gebruiker.-->
                        <span>Your api key here!</span>
                        <li>
                            <label for="key">key:</label><input id="key" type="text" value="key key key key key">
                        </li>
                    </ul>

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

@stop