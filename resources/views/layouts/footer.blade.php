<footer>
    <ul class="advertising row">
        @for($i = 0; $i < 3; $i ++)
            <li class="col-md-4">

                <h3>{{$ads[$i]->title}} </h3>
                <p>{{$ads[$i]->description}} </p>

            </li>
        @endfor
    </ul>
</footer>
