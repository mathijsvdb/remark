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
                <button id="generate_API_KEY">Generate Key</button>
                <ul class=""> <!-- lus hier keys uit die gelinkt zijn aan de gebruiker.-->
                    <span>Your api key here!</span>
                    <li>
                        <label for="key">key:</label><input id="key" type="text" value="key key key key key">
                    </li>
                </ul>
            </div>
                <!--<p>
                    The following url should give back Json data of popular items.
                    ​<span>/api/v1/items/popular</span>
                    These are the items you can find in the data:
                    <ul>
                    <li>title</li>
                    <li>url</li>
                    <li>image url</li>
                    <li>author</li>
                    <li>author profile image url</li>
                    <li>comments</li>
                    <li>number of likes</li>
                    <li>id of hash</li>
                </ul>
                </p>-->
            </div>
        </div>
    </div>

@stop