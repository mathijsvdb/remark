/**
 * Created by Marijn on 21/11/15.
 */
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){


    $(".notification_checkbox").change(function () {

        var value = $(this).val();
        $.ajax({
            type: "post",
            url: "http://remark.dev/profile/1/activityFilter",
            async: true,
            data:{
                likes: value // as you are getting in php $_POST['likes'];
            },
            success: function (data) {
                if (data == '' ) {
                    alert('Fail');
                } else {
                    $("#activity").prepend("<li>"+value+"</li>");
                }
            }
        });
    });
});
