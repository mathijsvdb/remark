@extends("layouts.master")

@section("content")

    <div class="container_filter form-group">
        <h2>Filter</h2>
        <form id="notification_filter" action="/">
            <span><input type="checkbox" class="notification_checkbox" id="all" value="all" checked="checked" class="notifications" name="all">all</span>
            <span><input type="checkbox" class="notification_checkbox" id="likes" value="likes" class="notifications" name="likes">like</span>
            <span><input type="checkbox" class="notification_checkbox" id="favorite" value="favorite" class="notifications" name="favorite">favorite</span>
            <span><input type="checkbox" class="notification_checkbox" id="comment" value="comment" class="notifications" name="comment">comment</span>

        </form>
    </div>

    <div class="activity">

        <h2>Your user activity</h2>
        <a href="#">New notifications <span class="badge aantalnotificaties">3</span></a>

        <div class="list-group notificationlist">
            <!-- Genereer zo een list item in controller-->
            <a href="#" class="list-group-item active" id="">
                <h4 class="list-group-item-heading"><i class="fa fa-thumbs-up"></i> <span class="notification_from_who" id="">Joske</span> <span class="notification_whathappend" id="">liked your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item active" id="">
                <h4 class="list-group-item-heading"><i class="fa fa-heart"></i> <span class="notification_from_who" id="">Tom</span> <span class="notification_whathappend" id="">favorited your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item active" id="">
                <h4 class="list-group-item-heading"><i class="fa fa-thumbs-up"></i> <span class="notification_from_who" id="">Marijn</span> <span class="notification_whathappend" id="">liked your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading" id=""><i class="fa fa-thumbs-up"></i> <span class="notification_from_who" id="">Koen Pellegrims</span> <span class="notification_whathappend" id="">liked your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading" id=""><i class="fa fa-heart"></i> <span class="notification_from_who" id="">Jonas</span> <span class="notification_whathappend" id="">favorited your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading" id=""><i class="fa fa-thumbs-up"></i> <span class="notification_from_who" id="">Matthias</span> <span class="notification_whathappend" id="">liked your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading" id=""><i class="fa fa-thumbs-up"></i> <span class="notification_from_who" id="">Thieuke</span> <span class="notification_whathappend" id="">liked your picture</span></h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
        </div>

    </div>
    <script src="{{ URL::asset('assets/js/notifications.js') }}"></script>
@stop