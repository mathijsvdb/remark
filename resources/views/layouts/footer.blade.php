<footer>
        <ul class="reclam row">

            @foreach($ads as $ad)
                <div class="col-md-4 ad" id="{{$ad->id}}">
                <li>
                    <a target="_blank" href="{{$ad->url}}">
                    <h3>{{$ad->title}} </h3>

                    <p>{{$ad->description}} </p>
                        <img style="width: 200px;" src="{{asset($ad->img)}}" alt="productsforyou">
                    </a>
                </li>
                </div>
            @endforeach
        </ul>
</footer>

<script>
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $(document).ready(function() {

        $(".ad").click(function(){

            var adID= $(this).attr("id");
            var _token = "{{ csrf_token() }}";

            var dataString = "id="+adID+"&token="+_token;

            $.ajax({
                type: "POST",
                url: "/advertising",
                data: dataString,
                success: function(data){
                    console.log(data);
                    //$("body" ).html(data); hij toont dat hij gaat naar de juiste pagina /advertising
                },
                error: function(xhr, status, error) {
                    console.log(error,status, xhr.responseText);
                }
            }).done(function(data){console.log("done: "+ data)})

        });

    });
</script>
