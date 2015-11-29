<footer>
        <ul class="advertising row">
            @foreach($ads as $ad)
                <div class="col-md-4">
                <li>
                    <a href="{{$ad->url}}">
                    <h3>{{$ad->title}} </h3>

                    <p>{{$ad->description}} </p>
                        <img src="http://placehold.it/200x150" alt="advertising">
                    </a>
                </li>
                </div>
            @endforeach
        </ul>
    </footer>
